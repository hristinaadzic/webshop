<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'firstname' => 'bail|required|regex:/^[A-ZČĆŠĐŽ][a-zčćšđž]{2,19}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,19})*$/',
                'lastname' => 'bail|required|regex:/^[A-ZČĆŠĐŽ][a-zčćšđž]{2,19}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,19})*$/',
                'email' => 'bail|required|unique:users,email|regex:/^[\w\.\-]+\@([a-z0-9]+\.)+[a-z]{2,3}$/',
                'password' => 'bail|required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/' //Minimum eight characters, at least one letter and one number:
        ];
    }

    public function messages()
    {
        //return parent::messages();
        return [
            'password.regex' => 'Password must contain minimum eight characters, at least one letter and one number'
        ];
    }
}
