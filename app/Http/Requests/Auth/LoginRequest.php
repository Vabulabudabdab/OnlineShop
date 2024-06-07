<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|string|email|exists:users',
            'password' => 'required|max:255',
        ];
    }

    public function messages(): array {
        return [

            'email.required' => 'Это поле необходимо для заполнения',
            'email.email' => 'Данное поле должно содержать электронную почту',

            'password.required' => 'Это поле необходимо для заполнения',
            'password.max' => 'Максимальная длина пароля 255 символов',
        ];
    }

}