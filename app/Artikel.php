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
}
