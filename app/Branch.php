<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    protected $fillable = ['customer_id', 'name', 'address', 'city', 'postal_code'];
}
