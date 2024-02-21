<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
            'email' => 'required|email|unique:App\Models\User,email|min:8|max:50',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()],
            'username' => 'required|alpha_dash|unique:App\Models\User,username',
            'role' => 'required|in:admin,member',
        ];
    }
}
