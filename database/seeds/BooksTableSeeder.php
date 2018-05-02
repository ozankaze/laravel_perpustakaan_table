<?php

use Illuminate\Database\Seeder;

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
            'amount' => '1',
            'author_id' => $author3->id,
        ]);





    }
}
