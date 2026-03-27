<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class HomeController extends Controller
{
    public function getHome() {
        $countBooks = 4;
        $countAuthors = 2;
        return  view('index', [
            'countBooks' => $countBooks,
            'countAuthors'=> $countAuthors
        ]);
    }

    public function sayHello($saluto = "Ciao"){
        //return $saluto;
        $authors = Author::all();
        $books = Book::all();
        
        return response()->json([
            "authors" => $authors,
            "books" => $books
        ]);
    }
}
