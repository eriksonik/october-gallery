<?php namespace Eriks\Gallery\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateVideosTable extends Migration
{
    public function up()
    {
        Schema::create('eriks_gallery_videos', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->enum('host', ['YouTube', 'Vimeo']);
            $table->string('title');
            $table->string('yt_watch');
            $table->boolean('published');
            $table->integer('order')->default(1);
            $table->timestamps();
        });

        Schema::create('eriks_gallery_playlist_video', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('playlist_id');
            $table->unsignedInteger('video_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eriks_gallery_videos');
        Schema::dropIfExists('eriks_gallery_playlist_video');
    }
}
