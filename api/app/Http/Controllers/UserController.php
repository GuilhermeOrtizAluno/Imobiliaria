<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        return response()->json([
            "user" => $user
        ], 200);
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        return response()->json([
            "user" => $user
        ], 200);
    }

    public function list()
    {
        $users = User::all();

        return response()->json([
            "users" => $users
        ], 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'surname'   => 'required',
            'email'     => 'required',
            'username'  => 'required',
            'password'  => 'required',
        ]);

        $user = new User();
        $user->name     = $request->input('name');
        $user->surname  = $request->input('surname');
        $user->email    = $request->input('email');
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->save();

        return response()->json([
            "message" => "User created"
        ], 201);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $user = User::find($request->input('id'));
        $user->name     = $request->input('name');
        $user->surname  = $request->input('surname');
        $user->email    = $request->input('email');
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->save();

        return response()->json([
            "message" => "User updated"
        ], 200);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json([
            "message" => "User deleted"
        ], 200);
    }
}
