<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $primarykey = 'id';
    protected $fillable = [
        'title',
        'content',
        'writer',
        'image',
        'imageDesc'
    ];

    public static function addArticle($title, $content, $writer, $image, $imageDesc){
        Artikel::create([
            'title' => $title,
            'content' => $content,
            'writer' => $writer,
            'image' => $image,
            'imageDesc' => $imageDesc
        ]);
    }

    public static function getAllData(){
        return Artikel::all();
    }

    public static function findArticle($id){
        return Artikel::where("id",$id)->first();
    }

    public static function deleteArticle($id){
        $data = Artikel::where('id',$id)->first();
        $data->delete();
    }
}
