<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:users,name,'.$this->user->id,
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'phone' => 'required|numeric|min:12',
            'address' => 'required|string'
        ];
    }
}
