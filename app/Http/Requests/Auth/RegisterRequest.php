<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:37',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|max:255',
        ];
    }

    public function messages(): array {
        return [
            'username.required' => 'Это поле необходимо для заполнения',
            'username.max' => 'Максимальная длина имени 37 символов',
            'username.string' => 'Имя не должно быть числом',

            'email.required' => 'Это поле необходимо для заполнения',
            'email.email' => 'Данное поле должно содержать электронную почту',
            'email.unique' => 'Данный email занят',

            'password.required' => 'Это поле необходимо для заполнения',
            'password.max' => 'Максимальная длина пароля 255 символов',
        ];
    }
}
