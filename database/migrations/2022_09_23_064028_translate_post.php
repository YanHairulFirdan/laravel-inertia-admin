<?php

use App\Models\Language;
use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function () {
           $posts = Post::query()->lazyById();
           $language = Language::first();
           /** @var \App\Models\Post $post */
           foreach ($posts as $key => $post) {
                $post->languages()->attach($language);
                $post->title = $post->getRawOriginal('title');
                $post->content = $post->getRawOriginal('content');

                $post->save();
           }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
