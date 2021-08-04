<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'UserName' => 'required|min:5|max:250|unique:User,UserName|regex:/^[0-9a-zA-Z\-\_\.]+$/i',
            'Email' => 'required|min:5|max:250|email:rfc|unique:User,Email',
            'Password' => 'required|min:5|max:250',
            'RePassword' => 'required|same:Password'
        ];
    }

    public function attributes(): array
    {
        return [
            'UserName' => __('user.user_name'),
            'Email' => __('user.email'),
            'Password' => __('user.password'),
            'RePassword' => __('user.confirm_password')
        ];
    }
}
