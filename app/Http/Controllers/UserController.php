<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function viewHome()
    {
        $artikelList = Artikel::getAllData();
        return view('userView.home')->with('artikel',$artikelList);
    }
}
