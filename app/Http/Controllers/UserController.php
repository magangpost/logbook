<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show($username)
    {
        return view('user', [
            'user' => User::where('username', '=', $username)->first()
        ]);
    }

    public function index()
    {
        $users = User::all();

        return view('users.index', ['users' => $users]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'admin' => ['nullable', 'boolean'],
        ]);

        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->role = $request->role;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->admin = filter_var($request->admin, FILTER_VALIDATE_BOOLEAN);

        $user->save();
        return redirect()->route('users.index');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
