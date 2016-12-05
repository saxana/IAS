<?php

namespace App\Http\Controllers;

use App\Lib;

class LibraryController extends Controller
{
    //
    public function index(){
        return response()->json(Lib::limit(10)->get());
    }
    public function show($id){
        return response()->json(Lib::find($id));
    }
}
