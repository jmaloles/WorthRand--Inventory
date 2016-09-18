<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'address', 'city', 'postal_code'
    ];


    public static function createCustomer($createCustomerRequest)
    {
        $customer = new Customer();
        $customer->name = $createCustomerRequest->get('name');
        $customer->address = $createCustomerRequest->get('address');
        $customer->city = $createCustomerRequest->get('city');
        $customer->postal_code = $createCustomerRequest->get('postal_code');
        $customer->operation_customer_account_no = $createCustomerRequest->get('operation_customer_account_no');

        if($customer->save()) {
            $alert = "success";
            $icon = "check";

            return redirect()->back()->with('message', 'Customer was successfully created')->with('alert', $alert)
                ->with('icon', $icon);
        } else {
            $alert = "danger";
            $icon = "times";

            return redirect()->back()->with('message', 'Adding customer was unsuccessful')->with('alert', $alert)
                ->with('icon', $icon);
        }
    }
}
