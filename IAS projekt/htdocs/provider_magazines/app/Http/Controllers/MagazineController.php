<?php

namespace App\Http\Controllers;

use App\Magazine;

class MagazineController extends Controller
{
    //
    public function index(){
        return response()->json(Magazine::limit(10)->get());
    }
    public function show($id){
        return response()->json(Magazine::find($id));
    }
}
