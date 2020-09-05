<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewHome()
    {
        $artikelList = Artikel::pageAllData();
        return view('userView.home')->with('artikel',$artikelList);
    }

    public function viewArtikel($id)
    {
        $artikel = Artikel::findArticle($id);
        return view('userView.article',['art'=>$artikel]);
    }
}
