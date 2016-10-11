<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    protected $fillable = ['customer_id', 'name', 'address', 'city', 'postal_code'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public static function saveBranch($request, $customer)  {
        $branch = new Branch();
        $branch->customer_id = $customer->id;
        $branch->name = $request->get('name');
        $branch->address = $request->get('address');
        $branch->city = $request->get('city');
        $branch->postal_code = $request->get('postal_code');

        if($branch->save()) {

                return redirect()->back();
            }

        }


}
