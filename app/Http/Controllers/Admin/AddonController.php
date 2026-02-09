<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use Illuminate\Http\Request;

class AddonController extends Controller
{
    public function index()
    {
        $addons = Addon::latest()->get();
        return view('admin.addons.index', compact('addons'));
    }

    public function create()
    {
        return view('admin.addons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|unique:addons,name',
            'price'  => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        Addon::create($request->only('name', 'price', 'status'));

        return redirect()
            ->route('admin.addons.index')
            ->with('success', 'Add-on created successfully');
    }

    public function edit(Addon $addon)
    {
        return view('admin.addons.edit', compact('addon'));
    }

    public function update(Request $request, Addon $addon)
    {
        $request->validate([
            'name'   => 'required|unique:addons,name,' . $addon->id,
            'price'  => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $addon->update($request->only('name', 'price', 'status'));

        return redirect()
            ->route('admin.addons.index')
            ->with('success', 'Add-on updated successfully');
    }

    public function destroy(Addon $addon)
    {
        $addon->delete();

        return redirect()
            ->route('admin.addons.index')
            ->with('success', 'Add-on deleted successfully');
    }
}
