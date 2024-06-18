<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        if ($this->password) {
            return [
                'name' => 'required|max:100|min:3',
                'email' => 'required|email',
                'password' => 'required|min:8',
                'phone' => 'required',
                'roles' => 'required',
            ];
        }else{
            return [
                'name' => 'required|max:100|min:3',
                'email' => 'required|email',
                'phone' => 'required',
                'roles' => 'required',
            ];
        }

    }
}
