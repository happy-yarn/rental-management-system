<?php

namespace App\Http\Requests;

use App\Enums\UserType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['nullable', 'numeric', Rule::in(UserType::getAllValues())],
            'email' => [
                'required',
                'string',
                'email:rfc',
                Rule::unique('users')->ignore($this->user->id)
            ],
            'new_password' => ['nullable', 'string', Password::min(8)],
            'current_password' => [
                'nullable',
                'string',
                Password::min(8),
                Rule::requiredIf(fn () => $this->filled('new_password'))
            ],
        ];
    }
}
