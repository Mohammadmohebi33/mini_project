<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $rules = [];
        if (request()->getMethod() == 'POST') {
            $rules =  [
                'name' => ['required', 'min:4', 'max:35'],
                'email' => ['required', 'unique:users'],
                'password' => ['required', 'min:8', 'max:35'],
                'about_me' => ['nullable', 'max:250'],
                'status' => ['required'],
                'roles' => ['required']
            ];
        } elseif (request()->getMethod() == 'PATCH') {
            $rules =  [
                'name' => ['required', 'min:4', 'max:35'],
                'about_me' => ['nullable', 'max:250'],
                'status' => ['required'],
                'roles' => ['required'],
                'image' => ['nullable','mimes:jpeg,png,jpg'],
            ];
        }
        return $rules;
    }
}
