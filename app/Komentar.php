<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentars';
    protected $primarykey = 'id';
    protected $fillable = [
        'id_article',
        'name',
        'comment'
    ];

    static public function addKomentar($id_article, $nama, $comment)
    {
        Komentar::create([
            'id_article'=>$id_article,
            'name'=>$nama,
            'comment'=>$comment
        ]);
    }

    static public function findKomentar($id){
        return Komentar::where("id_article",$id)->get();
    }

}
