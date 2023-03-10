<?php namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiDistrictLines extends Migration
{
    public function up()
{
    Schema::create('pp_kistochki_district_lines', function($table)
    {
        $table->engine = 'InnoDB';
        $table->increments('id')->unsigned();
        $table->string('title');
        $table->string('slug')->nullable();
        $table->string('color')->nullable();
        $table->boolean('is_district')->default(1);
        $table->integer('sort_order')->default(0);
        $table->integer('city_id')->nullable();
        $table->boolean('status')->default(0);
    });
}

public function down()
{
    Schema::dropIfExists('pp_kistochki_district_lines');
}
}
