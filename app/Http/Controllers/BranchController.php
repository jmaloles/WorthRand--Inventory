<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Branch;
use App\Customer;
use App\Http\Requests\CreateCustomerBranchRequest;

class BranchController extends Controller
{
    //
    public function adminCreateBranch(Customer $customer)
    {
        return view('branch.admin.create', compact('customer'));
    }

    public function adminPostCreateBranch(CreateCustomerBranchRequest $createCustomerBranchRequest, Customer $customer)
    {
        $branch = Branch::create($createCustomerBranchRequest->all());

        return redirect()->back()->with('message', 'Branch ['. $branch->name .'] was successfully created');
    }

    public function adminBranchIndex()
    {
        $ctr = 0;
        $branches = Branch::paginate(30);

        return view('branch.admin.index', compact('branches', 'ctr'));
    }

}
