<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use App\IndentedProposal;
use App\BuyAndSellProposal;
use App\BuyAndSellProposalItem;
use App\TargetRevenue;
use Khill\Lavacharts\Lavacharts;
use App\Group;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public static function createUser($createUserRequest)
    {
        $user = new User();
        $user->name = $createUserRequest->get('name');
        $user->email = $createUserRequest->get('email');
        $user->password = bcrypt($createUserRequest->get('password'));
        $user->role = $createUserRequest->get('role');

        if($user->save()) {
            $alert = "success";
            $icon = "check";

            return redirect()->back()->with('message', 'User ' . $user->name . ' was successfully created')->with('alert', $alert)
                                     ->with('icon', $icon);
        } else {
            $alert = "danger";
            $icon = "times";

            return redirect()->back()->with('message', 'Adding user was unsuccessful')->with('alert', $alert)
                ->with('icon', $icon);
        }
    }

    public static function adminDashboard()
    {
        $ctr = 0;
        $indented_proposals = IndentedProposal::where('status', 'SENT')->paginate(30);
        $indented_proposals->setPath('dashboard');

        $ctr2 = 0;
        $buy_and_sell_proposals = BuyAndSellProposal::where('status', 'SENT')->paginate(30);
        $buy_and_sell_proposals->setPath('dashboard');


        $users = User::all();

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
         * TARGET SALES CHART
         */

        $targetRevenues = TargetRevenue::all();

        $target_chart = new Lavacharts();
        $data = $target_chart->DataTable();
        $data->addStringColumn('Groups')
            ->addNumberColumn('Current Sale');


        foreach($targetRevenues as $targetRevenue) {
            $data->addRow(array('Current Sale', $targetRevenue->current_sale));
        }

        $pie_chart = $target_chart->ColumnChart('TARGETSALE')
            ->setOptions(array(
                    'datatable' => $data,
                    'title' => 'Total Sales',
                    'height' => 400,
                    'width' => 500
                )
            );

        return view('auth.admin.dashboard', compact('target_chart', 'lava', 'indented_proposals', 'buy_and_sell_proposals', 'ctr', 'ctr2'));
    }
}
