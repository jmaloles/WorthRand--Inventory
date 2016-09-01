<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    //
    public function adminDashboard()
    {
        return view('home');
    }
    public function collectionDashboard()
    {
        return view('auth.collection.dashboard');
    }

    public function userDashboard()
    {
        return view('auth.user.dashboard');
    }
    public function assistantDashboard()
    {
        return view('auth.assistant.dashboard');
    }
}
