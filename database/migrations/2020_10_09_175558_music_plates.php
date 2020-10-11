<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MusicPlates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_plates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                    ->onUpdate('cascade')->onUpdate('cascade');
            $table->string('music_author', 100);
            $table->string('album_name', 100);
            $table->string('genre_of_music', 100);
            $table->string('record_label', 50);
            $table->date('date_of_creation_album');
            $table->string('created_by_user', 25);
            $table->timestamps();
            $table->unique([
                'music_author',
                'album_name'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('music_plates');
    }
}
