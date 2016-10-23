<?php

namespace App\Http\Controllers\SalesEngineer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function dashboard()
    {
        $se_dashboard = User::salesEngineerDashboard();

        return $se_dashboard;
    }
}