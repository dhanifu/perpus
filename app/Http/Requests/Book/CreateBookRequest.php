<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
            'title' => 'required|string',
            'code' => 'required|string|min:1|max:8|unique:books',
            'writer' => 'required|string',
            'publisher' => 'required|string',
            'year' => 'required|numeric|digits:4|min:1900',
            'rack_id' => 'required|exists:racks,id',
            'photo' => 'required|image'
        ];
    }
}
