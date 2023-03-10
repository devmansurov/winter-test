<?php

namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiCategories extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_categories', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('slug');
            $table->text('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('sort_order')->default(0);
            $table->integer('category_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_categories');
}
}
