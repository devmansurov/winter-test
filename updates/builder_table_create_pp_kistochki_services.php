<?php

namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiServices extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_services', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->string('slug');
            $table->integer('link_weight')->default(0);
            $table->smallInteger('order')->default(0);
            $table->boolean('pro')->default(0);
            $table->boolean('hit')->default(0);
            $table->boolean('status')->default(0);
            $table->integer('price_id')->nullable();
            $table->integer('city_id');
            $table->integer('category_id')->nullable();
            $table->integer('seo_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_services');
}
}
