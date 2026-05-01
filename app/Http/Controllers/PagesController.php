<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Blog;
use App\Models\CareerApplication;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class PagesController extends Controller
{
  
public function index()
{
    // Only New Arrival products
    $products = Product::where('status', 1)
        ->where('is_new_arrival', 1)
        ->latest()
        ->limit(8)
        ->get();

    $categories = Category::all();

    return view('pages.index', compact('products', 'categories'));
}



    public function about()
    {
        return view('pages.about-us');
    }

    public function contact()
    {
        return view('pages.contact-us');
    }

    public function careers() {
        return view('pages.career');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'position' => 'required',
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        // Upload Resume
        $resumeName = time().'_'.$request->resume->getClientOriginalName();
        $request->resume->move(public_path('uploads/resume'), $resumeName);

        CareerApplication::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position' => $request->position,
            'resume' => $resumeName,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Application submitted successfully!');
    }

    public function applications()
{
    $applications = CareerApplication::latest()->get(); // fetch all

    return view('admin.career.index', compact('applications'));
}

public function destroy($id)
{
    $application = CareerApplication::findOrFail($id);

    // Delete resume file
    $resumePath = public_path('uploads/resume/' . $application->resume);
    if (file_exists($resumePath)) {
        unlink($resumePath);
    }

    $application->delete();

    return redirect()->route('admin.career.index')
        ->with('success', 'Application deleted successfully.');
}
    // Products

    public function portableevchargers()
    {
        // Get category
        $category = Category::where('name', 'Portable Ev Car Charger')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderByRaw("FIELD(id, 3,4,1,2)") // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.portable-ev-car-chargers', compact(
            'products',
            'categories',
            'category'
        ));
    }
    public function popularac()
    {
          // Get category
        $category = Category::where('name', 'Popular Ev Car Charger')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderBy('id', 'asc') // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.popular-ev-car-charger', compact(
            'products',
            'categories',
            'category'
        ));
    }

    public function acchargers()
    {
   // Get category
        $category = Category::where('name', 'AC Chargers')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderBy('id', 'asc') // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.ac-chargers', compact(
            'products',
            'categories',
            'category'
        ));
    }

    public function dcchargers()
    {
      // Get category
        $category = Category::where('name', 'DC Charger')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderBy('id', 'asc') // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.dc-chargers', compact(
            'products',
            'categories',
            'category'
        ));
    }

    public function gunholders()
    {
         // Get category
        $category = Category::where('name', 'Gun Holders')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderBy('id', 'asc') // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.gun-holders', compact(
            'products',
            'categories',
            'category'
        ));
    }

    public function accessories()
    {
          // Get category
        $category = Category::where('name', 'Accessories')->firstOrFail();

        // Get products in ASC order
        $products = Product::where('status', 1)
            ->where('category_id', $category->id)
            ->orderBy('id', 'asc') // ASCENDING ORDER
            ->get();

        // All categories (for menu/sidebar)
        $categories = Category::all();

        return view('products.accessories', compact(
            'products',
            'categories',
            'category'
        ));
    }

          public function blog(){
         $blogs = Blog::orderBy('id', 'DESC')->get();
        return view('pages.blog', compact('blogs'));
    }

       public function show($slug){
        $blogs = Blog::where('slug', $slug)->firstOrFail();
        return view('pages.details', compact('blogs'));
    }
    
      public function privacy(){
        return view('pages.privacy-policy');
    }

    public function term(){
        return view('pages.terms');
    }

    public function refund(){
        return view('pages.refund-policy');
    }
    
    public function sendMail(Request $request)
{

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'mobile' => 'required',
        'requirement' => 'required',
        'message' => 'nullable'
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'requirement' => $request->requirement,
        'message' => $request->message
    ];

    Mail::to('service@ev-fast.com')->send(new ContactMail($data));

    return back()->with('success','Message sent successfully');

}

     
}