<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users =  User::query()->with(['person', 'orders'])->get();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {


        $user = user::create($request->all());
        return redirect()->route('users.show', $user);
    }

    public function show(User $user)
    {
        return view('user.show', ['user' => $user]);

    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {



        $user->update($request->all());
        return redirect()->route('users.show', $user);
    }

    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
