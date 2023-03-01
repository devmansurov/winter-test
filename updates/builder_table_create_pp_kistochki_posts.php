<?php

namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiPosts extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_posts', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->smallInteger('order')->default(0);
            $table->boolean('status')->default(0);
            $table->boolean('hit')->default(0);
            $table->integer('type');
            $table->integer('city_id')->nullable();
            $table->integer('post_id')->nullable();
            $table->integer('seo_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_posts');
}
}
