<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // protected $fillable = [
    //     'title',
    //     'content',
    //     'writer',
    //     'image',
    //     'imageDesc'
    // ];
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('writer_id')->references('id')->on('users');
            $table->longText('content');
            $table->string('writer');
            $table->string('image');
            $table->string('imageDesc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artikel');
    }
}
