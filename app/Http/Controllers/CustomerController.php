<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCustomerRequest;
use App\Customer;


use App\Http\Requests;

class CustomerController extends Controller
{

    public function adminCustomerIndex()
    {
        return view('customer.admin.index');
    }

    public function adminCreateCustomer()
    {
        return view('customer.admin.create');
    }

    public function adminPostCustomer(CreateCustomerRequest $createCustomerRequest)
    {
        $create_customer = Customer::createCustomer($createCustomerRequest);

        return $create_customer;
    }

}
