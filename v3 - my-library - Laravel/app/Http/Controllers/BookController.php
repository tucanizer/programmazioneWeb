<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('books.bookList', ["books"=>$books]);

    }

    public function details($bookId) {
        $book = Book::find($bookId);
        return view('books.bookDetails', ["book"=>$book]);
    }


    public function viewForm($bookId = null) {
        $book=[
                "id" => null,
                "title" => null,
                "author" => null,
                "genre" => null,
                "price" => null,
                "image" => null
            ];
        if($bookId){
            $book = Book::find($bookId);
        }
        return redirect()->route('book.index');
    }



    // Input data of the book to create
    public function createBook(Request $request){
        $title = $request->input('title');
        //$author = $request->input('author');
        //$genre = $request->input('genre');
        $price = $request->input('price');
        $year = $request->input('year');

        $book = new Book();
        $book->title = $title;
        //$book->author = $author;
        //$book->genre = $genre;
        $book->price = $price;
        $book->year = $year;
        $book->save();

        return "This function should create the book";
    }

    // Input data of the book to edit + $idBook
    public function editBook(request $request){
        $idBook = $request->input('id');
        $book = Book::findOrFail($idBook);


        return redirect()->route('book.index'); 
    }

    public function deleteBook($bookId){
        $book = Book::findOrFail($bookId);
        $book->deleteQuietly();

        return redirect()->route('book.index');
    }
}
