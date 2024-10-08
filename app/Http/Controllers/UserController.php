<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

    // Metode baru untuk mengambil semua pengguna
    public function index()
    {
        $users = User::all(); // Mengambil semua data pengguna dari database

        return view('users', [
            'users' => $users
        ]);
    }
}
