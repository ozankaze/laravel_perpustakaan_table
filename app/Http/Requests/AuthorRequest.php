<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|min:2|unique:authors'
                ];
                break;

            case 'PATCH':
            case 'PUT':
                return [
                    'name' => 'required|min:2|unique:authors'
                ];
            break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Gak Boleh Kosong' ,
            'name.unique' => 'Nama Sudah Terpakai Carilah Nama Lain'
        ];
    }
}
