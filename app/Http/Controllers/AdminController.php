<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewAddArticle(){
        return view('adminView.addArticle');
    }

    public function viewManageArticle()
    {
        $data = Artikel::getAllData();
        return view('adminView.manageArticle')->with('list',$data);
    }

    public function viewEditArticle($id){
        $data = Artikel::findArticle($id);
        return view('adminView.editArticle')->with('data',$data);
    }

    public function addArticle(Request $req){
        $rules =[
            'txt_title' => 'required',
            'txt_content' => 'required',
            'txt_writer' => 'required',
            'img_article' => 'required|image|mimes:jpeg,png',
            'txt_imgDesc' => 'required'
        ];
        $attributes=[
            'txt_title' => 'Article title',
            'txt_content' => 'Article content',
            'txt_writer' => 'Article writer',
            'img_article' => 'Article image',
            'txt_imgDesc' => 'Image description'
        ];
        $messages=[
            'required' => ':attribute is required.',
            'image' => ':attribute must be a image.',
            'mimes' => ':attribute format must be :values.'
        ];

        $this->validate($req, $rules, $messages, $attributes);

        $title = $req->txt_title;
        $content = $req->txt_content;
        $writer = $req->txt_writer;
        $path = $req->file('img_article')->store('img');
        $imgDesc = $req->txt_imgDesc;
        Artikel::addArticle($title,$content,$writer,$path,$imgDesc);
        return redirect("/admin/addArticle")->with("success", "Article added successfuly!");
    }

    public function updateArticle($id, Request $req){
        $rules =[
            'txt_title' => 'required',
            'txt_content' => 'required',
            'txt_writer' => 'required',
            'img_article' => 'image|mimes:jpeg,png',
            'txt_imgDesc' => 'required'
        ];
        $attributes=[
            'txt_title' => 'Article title',
            'txt_content' => 'Article content',
            'txt_writer' => 'Article writer',
            'img_article' => 'Article image',
            'txt_imgDesc' => 'Image description'
        ];
        $messages=[
            'required' => ':attribute is required.',
            'image' => ':attribute must be a image.',
            'mimes' => ':attribute format must be :values.'
        ];
    }

    public function deleteArticle($id){
        Artikel::deleteArticle($id);
        return back();
    }
}
