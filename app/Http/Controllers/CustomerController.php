<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCustomerRequest;
use App\Customer;


use App\Http\Requests;
use App\Http\Requests\UpdateCustomerInformationRequest;
use App\CustomerUser;

class CustomerController extends Controller
{

    public function adminCustomerIndex()
    {
        $ctr = 0;
        $customers = Customer::paginate(30);
        $customers->setPath('customers');

        return view('customer.admin.index', compact('customers', 'ctr'));
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

    public function adminShowCustomerProfile(Customer $customer)
    {
        return view('customer.admin.show', compact('customer'));
    }

    public function adminEditCustomerInformation(Customer $customer)
    {
        return view('customer.admin.edit', compact('customer'));
    }

    public function adminPostEditCustomerInformation(UpdateCustomerInformationRequest $updateCustomerInformationRequest, Customer $customer)
    {
        $customer->update($updateCustomerInformationRequest->all());

        return redirect()->back()->with('message', "Updating Customer [" . strtoupper($customer->name) . "] information was successful");
    }

    public function adminCustomerBranchList(Customer $customer)
    {
        $ctr = 0;
        $branches = Branch::whereCustomerId($customer->id)->paginate(30);
        $branches->setPath('customer/' . $customer->id . '/branches');

        return view('customer.admin.branches', compact('customer', 'branches', 'ctr'));
    }

    public function adminFetchCustomers()
    {
        $array_customer = [];
        $customers = Customer::all();

        foreach($customers as $customer) {
            $array_customer['suggestions'][] = [
                'data' => $customer->id,
                'value' => $customer->name
            ];
        }

        return json_encode($array_customer);
    }

    public function adminSaveCustomer(Request $request)
    {
        $customer_save = new CustomerUser();
        $customer_save->user_id = $request->get('user_id');
        $customer_save->customer_id = $request->get('customer_id');

        if($customer_save->save()) {
            return redirect()->back()->with('message', 'Customer Successfully Assigned');
        }
        return redirect()->back()->with('message', 'Customer Not Assigned');
    }

}