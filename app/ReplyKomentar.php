<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReplyKomentar extends Model
{
    //
    protected $table = 'reply_komentars';
    protected $primarykey = 'id';
    protected $fillable = [
        'id_komentar',
        'id_user',
        'name',
        'comment'
    ];

    static public function addReply($id_komentar, $id_user, $name, $comment){
        ReplyKomentar::create([
            'id_komentar' => $id_komentar,
            'id_user' => $id_user,
            'name' => $name,
            'comment' => $comment
        ]);
    }

    static public function getReply($id_article){
        $data = DB::table('artikel as a')->join('komentars as k','a.id','=','k.id_article')
            ->join('reply_komentars as rk','k.id','=','rk.id_komentar')
            ->where('a.id','=',$id_article);
        return $data->get();
    }

//     SELECT
// 	rk.id_komentar,
// 	rk.name,
// 	rk.comment,
// 	rk.id_user,
// 	a.id
// FROM artikel a
// JOIN komentars k ON a.id=k.id_article
// JOIN reply_komentars rk ON k.id=rk.id_komentar
// WHERE a.id=1

    public function komentar(){
        return $this->belongsTo('App\Komentar','id_komentar');
    }

    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
}
