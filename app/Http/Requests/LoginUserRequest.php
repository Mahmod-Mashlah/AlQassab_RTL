<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'first_name' => ['required', 'string', 'max:30', 'min:2'/*'unique:users'*/],
            'middle_name' => ['required', 'string', 'max:30', 'min:2'/*'unique:users'*/],
            'last_name' => ['required', 'string', 'max:30', 'min:2'/*'unique:users'*/],
            // 'birth_date' => ['required', 'date',],
            'password' => [
                'required'/*'confirmed'*/ /*Password::defaults()*/, 'min:6'
            ],

        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'لم يتم إدخال الاسم ',
            'middle_name.required' => 'لم يتم إدخال الاسم ',
            'last_name.required' => 'لم يتم إدخال الاسم ',

            'password.min' => 'كلمة السر يجب أن تحوي على الأقل 6 رموز ',
            'password.required' => 'لم يتم إدخال كلمة السر',
        ];
    }
}
