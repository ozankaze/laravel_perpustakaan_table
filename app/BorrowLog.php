<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowLog extends Model
{
    protected $fillable = [
        'book_id', 'user_id', 'is_returned'
    ];

    protected $casts = [
        'is_returned' => 'boolean',
        /* terdapat fitur attribute casting yang akan otomatis merubah nilai
        sebuah field ketika diambil atau disimpan,
        is_returned menjadi nilai true atau false . */
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
