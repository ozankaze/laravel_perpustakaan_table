<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
              'title' => 'required|unique:books,title',
              'author_id' => 'required|exists:authors,id',
              'amount' => 'required|numeric',
              'cover' => 'image|max:2048',
            ];
            break;

          case 'PATCH':
          case 'PUT':
            return [
              'title' => 'required|unique:books,title,' . $this->route('book.id'),
              'author_id' => 'required|exists:authors,id',
              'amount' => 'required|numeric',
              'cover' => 'image|max:2048',
            ];
            break;
        }
    }

    public function messages()
    {
        return [
            'title.required' => 'Buku Gak Boleh Kosong',
            'title.unique' => 'Buku Sudah Ada Yang Punya Carilah Nama Lain',
            'author_id.required' => 'Penulis Harus Di Gak Boleh Kosong OM / Tante',
            'amount.required' => 'Jumlah Gak Boleh Kosong',
            'amount.numeric' => 'Harus Berupa NUMBERIC Jangan STRING',
        ];
    }
}
