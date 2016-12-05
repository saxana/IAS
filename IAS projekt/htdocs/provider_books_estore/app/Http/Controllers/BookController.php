<?php

namespace App\Http\Controllers;

use App\Book;

class BookController extends Controller
{
    //
    public function index(){
        return response()->json(Book::limit(10)->get());
    }
    public function show($id){
        return response()->json(Book::find($id));
    }
}
