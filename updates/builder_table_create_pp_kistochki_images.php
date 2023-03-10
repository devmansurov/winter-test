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
            $table->string('alt')->nullable();
            $table->string('title')->nullable();
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_images');
}
}
