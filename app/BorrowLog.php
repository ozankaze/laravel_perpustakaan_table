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

    public function scopeReturned($query)
    {
        // return $query->whereIsReturned(1);
        return $query->where('is_returned', 1);
        /* returned() untuk mendapatkan data
peminjaman yang sudah dikembalikan */
    }

    public function scopeBorrowed($query)
    {
        return $query->where('is_returned', 0);
        /* borrowed() untuk mendaptkan data
peminjaman yang belum dikembalikan */
    }
}
