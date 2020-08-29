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
        $file_img = $req->img_article;
        $fileName = $file_img->getClientOriginalName();
        $file_img->move('img', $fileName);
        $imgDesc = $req->txt_imgDesc;
        Artikel::addArticle($title,$content,$writer,$fileName,$imgDesc);
        return redirect("/addArticle")->with("success", "Article added successfuly!");
    }
}
