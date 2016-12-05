<?php

namespace App\Http\Controllers;

use App\Ksiazka;

class KsiazkaController extends Controller
{
    //
    public function index(){
        return response()->json(Ksiazka::limit(10)->get());
    }
    public function show($id){
        return response()->json(Ksiazka::find($id));
    }
}
