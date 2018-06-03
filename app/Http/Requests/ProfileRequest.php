<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
              'name' => 'required',
              'email' => 'required|unique:users,email,'
            ];
            break;

          case 'PATCH':
          case 'PUT':
            return [
                'name' => 'required',
                'email' => 'required|unique:users,email,'
            ];
            break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Gak Boleh Kosong',
            // 'name.unique' => 'Nama Sudah Ada Coba Ganti Email Lain',
            'email.required' => 'Email Gak Boleh Kosong',
            'email.unique' => 'Email Sudah Ada Coba Ganti Email Lain'
        ];
    }
}
