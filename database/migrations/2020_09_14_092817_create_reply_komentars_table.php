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

            $table->foreignId('id_komentar')
                ->references('id')
                ->on('komentars')
                ->onDelete('cascade');

            $table->foreignId('id_user')
                ->nullable()
                ->references('id')
                ->on('users')
                ->constrained()
                ->onDelete('cascade');

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
