<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Managers\AddressesManager;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct(protected AddressesManager $manager)
    {
    }


    public function index()
    {
        $addresses = Address::query()->with(['user'])->get();

        return view('address.index', compact('addresses'));
    }

    public function create()
    {
        return view('address.create');
    }

    public function store(AddressRequest $request)
    {

        $address = Address::create($request->all());
        return redirect()->route('addresses.show', $address);
    }


    public function show(Address $address)
    {
        return view('address.show', ['address' => $address]);
    }

    public function edit(Address $address)
    {
        return view('address.edit', compact('address'));
    }

    public function update(AddressRequest $request, Address $address)
    {
        $address->update($request->all());
        return redirect()->route('addresses.show', $address);
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('address.index');
    }
}

