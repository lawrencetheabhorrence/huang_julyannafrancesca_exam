<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'name' => 'required|string|min:5|max:100',
            'email' => 'required|string|email|max:100|unique:users,email',
            'password' => 'required|string|min:6',
        ];
    }
}
