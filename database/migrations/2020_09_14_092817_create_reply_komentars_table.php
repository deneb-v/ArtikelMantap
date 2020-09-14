<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyKomentarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_komentars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_komentar')->references('id')->on('komentars');
            $table->foreignId('id_user')->references('id')->on('users');
            $table->foreignId('id_user')->nullable()->constrained();
            $table->string('name');
            $table->string('comment');
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
        Schema::dropIfExists('reply_komentars');
    }
}
