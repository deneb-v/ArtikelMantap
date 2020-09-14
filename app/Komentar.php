<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentars';
    protected $primarykey = 'id';
    protected $fillable = [
        'id_article',
        'id_user',
        'name',
        'comment'
    ];

    static public function addKomentar($id_article, $id_user, $nama, $comment)
    {
        Komentar::create([
            'id_article'=>$id_article,
            'id_user'=>$id_user,
            'name'=>$nama,
            'comment'=>$comment
        ]);
    }

    static public function findKomentar($id){
        return Komentar::where("id_article",$id)->get();
    }

    public function article(){
        return $this->belongsTo('App\Artikel','id_article');
    }

    public function user(){
        return $this->belongsTo('App\User','id_user');
    }

    public function replyComment(){
        return $this->hasMany('App\ReplyKomentar','id_komentar','id');
    }
}
