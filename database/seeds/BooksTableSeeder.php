<?php

use Illuminate\Database\Seeder;
use App\Author;
use App\Book;
use App\BorrowLog;
use App\User;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sample penulis
        $author1 = Author::create([
            'name' => 'Fauzan'
        ]);
        $author2 = Author::create([
            'name' => 'Fikri'
        ]);
        $author3 = Author::create([
            'name' => 'Rifki'
        ]);

        // sample buku
        $book1 = Book::create([
            'title' => 'Jangan Ada Dusta Di Antara Mereka',
            'amount' => '5',
            'author_id' => $author1->id,
        ]);

        $book2 = Book::create([
            'title' => 'One Piece',
            'amount' => '2',
            'author_id' => $author2->id,
        ]);

        $book3 = Book::create([
            'title' => 'Black Clover',
            'amount' => '4',
            'author_id' => $author3->id,
        ]);

        $book3 = Book::create([
            'title' => 'Shingeki No kyojin',
            'amount' => '0',
            'author_id' => $author3->id,
        ]);

        // sample meminjam buku 
        $member = User::where('email', 'member@main.com')->first();
        BorrowLog::create([
            'user_id' => $member->id,
            'book_id' => $book1->id,
            'is_returned' => 0
        ]);

        BorrowLog::create([
            'user_id' => $member->id,
            'book_id' => $book2->id,
            'is_returned' => 0
        ]);

        BorrowLog::create([
            'user_id' => $member->id,
            'book_id' => $book3->id,
            'is_returned' => 1
        ]);





    }
}
