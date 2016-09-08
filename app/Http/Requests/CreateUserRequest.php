<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class CreateUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
            'role' => 'required'
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'Employee Name is Required',
            'email.required' => 'E-mail is required. It also serves as Username',
            'email.unique' => 'That e-mail has already taken. Please choose another e-mail',
            'password.required' => 'Password is Required',
            'password.confirmed' => 'Password do not match',
            'role.required' => 'You have to specify the users role'
        ];
    }
}
