<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

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

            return redirect()->back()->with('message', 'User was successfully created')->with('alert', $alert)
                                     ->with('icon', $icon);
        } else {
            $alert = "danger";
            $icon = "times";

            return redirect()->back()->with('message', 'Adding user was unsuccessful')->with('alert', $alert)
                ->with('icon', $icon);
        }
    }
}
