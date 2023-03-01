<?php

namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiImageables extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_imageables', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('image_id');
            $table->integer('imageable_id');
            $table->string('imageable_type');
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_imageables');
}
}
