<?php

namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiHitables extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_hitables', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('hit_id');
            $table->integer('hitable_id');
            $table->string('hitable_type');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pp_kistochki_hitables');
    }
}
