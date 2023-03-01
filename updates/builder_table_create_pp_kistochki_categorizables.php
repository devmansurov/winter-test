<?php

namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiCategorizables extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_categorizables', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('category_id');
            $table->integer('categorizable_id');
            $table->string('categorizable_type');
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_categorizables');
}
}
