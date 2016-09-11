<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Khill\Lavacharts\Lavacharts;
use App\Http\Requests\CreateUserRequest;
use App\Group;

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

        /*
         * GROUP CHART
         */

        $groups = Group::all();
        // Test if date was submitted
        /*if($request->date) {
            $users = $users->whereRaw("date(txt_sms_activities.created_at) = '" . $request->date . "'");
        }*/

        // create datatable
        $lava = new Lavacharts();

        $data = $lava->DataTable();
        $data->addStringColumn('Groups')
            ->addNumberColumn('Percent');
        foreach($groups as $group) {
            $data->addRow(array($groups->name, $groups->id));
        }

        $barchart = $lava->PieChart('USERS', $data, [
            'title' => 'Grouped Project',
            'is3D' => true,
            'height' => 400,
            'width' => 600
        ]);
        return view('home', compact('group_chart'));
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

        $piechart = $lava->PieChart('USERS')
            ->setOptions(array(
                'datatable' => $reasons,
                'title' => 'Project Sales',
                'is3D' => true,
                'height' => 400,
                'width' => 500
            ));

        /*
         * GROUP CHART
         */

        $groups = Group::all();
        // Test if date was submitted
        /*if($request->date) {
            $users = $users->whereRaw("date(txt_sms_activities.created_at) = '" . $request->date . "'");
        }*/

        // create datatable
        $group_chart = new Lavacharts();

        $data = $group_chart->DataTable();
        $data->addStringColumn('Groups')
            ->addNumberColumn('Percent');
        foreach($groups as $group) {
            $data->addRow(array($group->name, $group->id));
        }

        $pie_chart = $group_chart->PieChart('GROUPS')
        ->setOptions(array(
            'datatable' => $data,
            'title' => 'Grouped Project',
            'is3D' => true,
            'height' => 400,
            'width' => 500
        ));

        return view('auth.admin.dashboard', compact('group_chart', 'lava'));
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
        $users = User::where('role', '!=', 'super_admin')->where('role', '!=', 'admin')->get();

        return view('user.admin.index', compact('users'));
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

    public function showSalesEngineers()
    {
        $users = User::whereRole('sales_engineer')->get();

        return view('sales_engineer.admin.index', compact('users'));
    }
}
