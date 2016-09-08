<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Khill\Lavacharts\Lavacharts;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    //
    public function superAdminDashboard()
    {
        $users = User::all();
        // Test if date was submitted
        /*if($request->date) {
            $users = $users->whereRaw("date(txt_sms_activities.created_at) = '" . $request->date . "'");
        }*/

        // create datatable
        $lava = new Lavacharts();

        $reasons = $lava->DataTable();
        $reasons->addStringColumn('Users')
            ->addNumberColumn('Percent');
        foreach($users as $user) {
            $reasons->addRow(array($user->name, $user->id));
        }

        $barchart = $lava->PieChart('USERS', $reasons, [
            'title' => 'Count per User',
            'is3D' => true,
            'height' => 400,
            'width' => 600
        ]);

        return view('home')->with('lava', $lava);
    }

    public function adminDashboard()
    {
        $users = User::all();
        // Test if date was submitted
        /*if($request->date) {
            $users = $users->whereRaw("date(txt_sms_activities.created_at) = '" . $request->date . "'");
        }*/

        // create datatable
        $lava = new Lavacharts();

        $reasons = $lava->DataTable();
        $reasons->addStringColumn('Users')
            ->addNumberColumn('Percent');
        foreach($users as $user) {
            $reasons->addRow(array($user->name, $user->id));
        }

        $piechart = $lava->PieChart('USERS', $reasons, [
            'title' => 'Project Sales',
            'is3D' => true,
            'height' => 400,
            'width' => 600
        ]);

        return view('auth.admin.dashboard', compact('lava'));
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

    public function superAdminUserIndex()
    {
        return view('user.super_admin.index');
    }

    public function adminUserIndex()
    {
        return view('user.admin.index');
    }

    public function adminCreateUser()
    {
        return view('user.admin.create');
    }

    public function adminPostUser(CreateUserRequest $createUserRequest)
    {
        $create_user = User::createUser($createUserRequest);

        return $create_user;
    }
}
