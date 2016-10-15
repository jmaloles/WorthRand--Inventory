<?php

namespace App\Http\Controllers\Admin;

use Doctrine\Common\Annotations\Annotation\Target;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Khill\Lavacharts\Lavacharts;
use App\Http\Requests\CreateUserRequest;
use App\Group;
use App\Http\Controllers\Controller;
use App\IndentedProposal;
use App\TargetRevenue;

class UserController extends Controller
{
    //
    public function adminDashboard()
    {
        $ctr = 0;
        $indented_proposals = IndentedProposal::where('status', 'SENT')->paginate(30);
        $indented_proposals->setPath('dashboard');

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
            'width' => 400
        ));

        /*
         * GROUP CHART
         */

        $targetRevenues = TargetRevenue::all();
        // Test if date was submitted
        /*if($request->date) {
            $users = $users->whereRaw("date(txt_sms_activities.created_at) = '" . $request->date . "'");
        }*/

        // create datatable
        $target_chart = new Lavacharts();

        $data = $target_chart->DataTable();

        $data->addStringColumn('Groups')
            ->addNumberColumn('Current Sale')
            ->addNumberColumn('Target Sale')
            ->addRow(array('Target Sale', 6000000));


        foreach($targetRevenues as $targetRevenue) {
            $data->addRow(array('Current Sale', $targetRevenue->current_sale));
        }

        $pie_chart = $target_chart->ColumnChart('TARGETSALE')
            ->setOptions(array(
                'datatable' => $data,
                'title' => 'Target Revenue',
                'height' => 400,
                'width' => 500
            )
        );

        return view('auth.admin.dashboard', compact('target_chart', 'lava', 'indented_proposals', 'ctr'));
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

    public function showSalesEngineer(User $sales_engineer)
    {
        return view('sales_engineer.admin.show', compact('sales_engineer'));
    }

    public function adminEditSalesEngineer(User $sales_engineer)
    {
        return view('sales_engineer.admin.edit', compact('sales_engineer'));
    }
}
