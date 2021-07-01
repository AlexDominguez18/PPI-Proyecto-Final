<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('layouts.listaUsuarios',compact(['users']));
    }

    public function create()
    {
        return view('layouts.nuevoUsuario');
    }

    public function store(Request $request)
    {
        $userData = $request->except('_token');
        $userData['password'] = Hash::make($request->password);

        User::create($userData);

        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        return view('layouts.editarUsuario');
    }

    public function update()
    {
        //
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect()->route('user.index');
    }
}
