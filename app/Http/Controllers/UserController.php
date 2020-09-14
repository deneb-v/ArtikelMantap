<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Jobs\ProcessMail;
use App\Komentar;
use App\Mail\SubscribeMail;
use App\ReplyKomentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $comment = $artikel->komentar;
        $reply = ReplyKomentar::getReply($id);
        return view('userView.article',['art'=>$artikel, 'comment'=>$comment, 'reply'=>$reply]);
    }

    public function replyComment($id, Request $req){
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
        $id_user=null;
        if (Auth::check()) {
            $id_user = Auth::user()->id;
        }

        if(empty($name)){
            $name = 'Anonymous';
        }
        ReplyKomentar::addReply($id, $id_user, $name, $comment);
        return back()->with('commentSuccess', 'Reply successfully submited');
    }

    public function addComment($id, Request $req){
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
        $id_user=null;
        if (Auth::check()) {
            $id_user = Auth::user()->id;
        }

        if(empty($name)){
            $name = 'Anonymous';
        }

        Komentar::addKomentar($id, $id_user, $name, $comment);
        return back()->with('commentSuccess', 'Comment successfully submited');
    }

    public function sendMail(Request $req){
        $this->dispatch(new ProcessMail($req->email));
        return back();
    }
}
