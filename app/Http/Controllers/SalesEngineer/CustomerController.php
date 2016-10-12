<?php

namespace App\Http\Controllers\SalesEngineer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer;
use Auth;
use App\Branch;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $ctr = 0;
        $customers = Customer::whereUserId(Auth::user()->id)->paginate(50);
        $customers->setPath('customers');

        return view('customer.sales_engineer.index', compact('customers', 'ctr'));
    }

    public function show(Customer $customer)
    {
        return view('customer.sales_engineer.show', compact('customer'));
    }

    public function customerBranchList(Customer $customer)
    {
        $ctr = 0;
        $branches = Branch::whereCustomerId($customer)->paginate(50);
        $branches->setPath('branches');

        return view('customer.sales_engineer.branch.index', compact('branches', 'ctr', 'customer'));
    }
}
