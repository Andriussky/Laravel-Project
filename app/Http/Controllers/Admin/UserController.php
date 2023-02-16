<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        if (Auth::user()->role === User::ROLE_ADMIN){
            $user->role = $request->role;
        }
        $user->save();


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

        $data = $request->all();
        if ($request->password === null){
            unset($data['password']);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if (Auth::user()->role === User::ROLE_ADMIN){
            $user->role = $request->role;
        }
        $user->save();

        return redirect()->route('users.show', $user);
    }

    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
