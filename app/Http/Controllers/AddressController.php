<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Http\Controllers\Admin\ShippingZoneController;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = auth()->user()->addresses()->latest()->get();

        return view('user.addresses.index', compact('addresses'));
    }

    public function create()
    {
        $states = ShippingZoneController::indianStates();

        return view('user.addresses.create', compact('states'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'label'   => 'required|string|max:50',
            'name'    => 'required|string|min:3',
            'phone'   => 'required|digits:10',
            'address' => 'required|min:10',
            'pincode' => 'required|digits:6',
            'state'   => 'required|string',
            'city'    => 'required|string',
        ]);

        $data = $request->only(['label', 'name', 'phone', 'address', 'pincode', 'state', 'city']);
        $data['user_id'] = auth()->id();
        $data['is_default'] = $request->boolean('is_default');

        if ($data['is_default']) {
            auth()->user()->addresses()->update(['is_default' => false]);
        }

        Address::create($data);

        return redirect()->route('user.addresses.index')
            ->with('success', 'Address added successfully.');
    }

    public function edit(Address $address)
    {
        if ($address->user_id !== auth()->id()) {
            abort(403);
        }

        $states = ShippingZoneController::indianStates();

        return view('user.addresses.edit', compact('address', 'states'));
    }

    public function update(Request $request, Address $address)
    {
        if ($address->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'label'   => 'required|string|max:50',
            'name'    => 'required|string|min:3',
            'phone'   => 'required|digits:10',
            'address' => 'required|min:10',
            'pincode' => 'required|digits:6',
            'state'   => 'required|string',
            'city'    => 'required|string',
        ]);

        $data = $request->only(['label', 'name', 'phone', 'address', 'pincode', 'state', 'city']);
        $data['is_default'] = $request->boolean('is_default');

        if ($data['is_default']) {
            auth()->user()->addresses()->where('id', '!=', $address->id)->update(['is_default' => false]);
        }

        $address->update($data);

        return redirect()->route('user.addresses.index')
            ->with('success', 'Address updated successfully.');
    }

    public function destroy(Address $address)
    {
        if ($address->user_id !== auth()->id()) {
            abort(403);
        }

        $address->delete();

        return redirect()->route('user.addresses.index')
            ->with('success', 'Address deleted successfully.');
    }
}
