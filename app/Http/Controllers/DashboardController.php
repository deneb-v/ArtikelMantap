<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function viewAddArticle(){
        return view('dashboardView.addArticle');
    }

    public function viewManageArticle()
    {
        if (Auth::user()->role == 'admin') {
            $data = Artikel::getAllData();
        }
        else{
            //member
        }
        return view('dashboardView.manageArticle')->with('list',$data);
    }

    public function viewEditArticle($id){
        $data = Artikel::findArticle($id);
        return view('dashboardView.editArticle')->with('data',$data);
    }

    public function addArticle(Request $req,$id){
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
        $writer_id = $id;
        $path = $req->file('img_article')->store('img');
        $imgDesc = $req->txt_imgDesc;
        Artikel::addArticle($title,$content,$writer,$writer_id,$path,$imgDesc);
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
        $this->validate($req, $rules, $messages, $attributes);

        $path = "";
        if (empty($req->img_article)) {
            $data = Artikel::findArticle($id);
            $path = $data->image;
        }
        else{
            $data = Artikel::findArticle($id);
            $path = $data->image;
            Storage::delete($path);
            $path = $req->file('img_article')->store('img');
        }


        $title = $req->txt_title;
        $content = $req->txt_content;
        $writer = $req->txt_writer;
        $imgDesc = $req->txt_imgDesc;
        Artikel::updateArticle($id,$title,$content,$path,$imgDesc);
        return redirect('/admin')->with('success','Update article success!');
    }

    public function deleteArticle($id){
        $data = Artikel::findArticle($id);
        $path = $data->image;
        Storage::delete($path);
        Artikel::deleteArticle($id);
        return redirect('/admin')->with('success','Delete article success!');
    }
}
