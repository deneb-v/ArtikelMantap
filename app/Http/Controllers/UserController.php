<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Komentar;
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
        $comment = Komentar::findKomentar($id);

        return view('userView.article',['art'=>$artikel, 'comment'=>$comment]);
    }

    public function addComment($id, Request $req){
        // dd($req);

        $rules =[
            'txt_comment' => 'required',
        ];
        $attributes=[
            'txt_comment' => 'Comment box',
        ];
        $messages=[
            'required' => ':attribute is empty.',
        ];

        $this->validate($req, $rules, $attributes, $messages);

        $name = $req->txt_name;
        $comment = $req->txt_comment;

        if(empty($name)){
            $name = 'Anonymous';
        }

        Komentar::addKomentar($id, $name, $comment);
        return back()->with('commentSuccess', 'Comment successfully submited');
    }
}
