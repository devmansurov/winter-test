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
            $table->string('title')->nullable();
            $table->boolean('is_metro')->default(0);
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_districts');
}
}
