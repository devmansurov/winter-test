<?php

namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiSeos extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_seos', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_seos');
}
}
