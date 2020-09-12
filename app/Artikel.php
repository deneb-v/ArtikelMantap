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
        'writer_id',
        'image',
        'imageDesc'
    ];

    public function writer(){
        return $this->hasOne('App\user');
    }

    public static function addArticle($title, $content, $writer_id, $writer, $image, $imageDesc){
        Artikel::create([
            'title' => $title,
            'content' => $content,
            'writer' => $writer,
            'writer_id' => $writer_id,
            'image' => $image,
            'imageDesc' => $imageDesc
        ]);
    }

    public static function updateArticle($id,$title, $content, $image, $imageDesc){
        $data = Artikel::findArticle($id);
        $data->title = $title;
        $data->content = $content;
        $data->image=$image;
        $data->imageDesc=$imageDesc;
        $data->save();
    }

    public static function getAllData(){
        return Artikel::all();
    }

    public static function pageAllData(){
        return Artikel::paginate(4);
    }

    public static function findArticle($id){
        return Artikel::where("id",$id)->first();
    }

    public static function deleteArticle($id){
        $data = Artikel::where('id',$id)->first();
        $data->delete();
    }
}
