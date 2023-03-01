<?php

namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiTaggables extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_taggables', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('tag_id');
            $table->integer('taggable_id');
            $table->string('taggable_type');
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_taggables');
}
}
