<?php

namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiDistricts extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_districts', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->integer('order')->default(0);
            $table->boolean('status')->default(0);
            $table->integer('district_category_id');
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_districts');
}
}
