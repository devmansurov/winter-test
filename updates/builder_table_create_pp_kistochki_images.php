<?php

namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiImages extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_images', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('key')->nullable();
            $table->smallInteger('order')->default(0);
            $table->integer('parent_id')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_images');
}
}
