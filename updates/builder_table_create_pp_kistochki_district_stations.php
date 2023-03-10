<?php namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiDistrictStations extends Migration
{
    public function up()
{
    Schema::create('pp_kistochki_district_stations', function($table)
    {
        $table->engine = 'InnoDB';
        $table->increments('id')->unsigned();
        $table->string('title');
        $table->string('slug')->nullable();
        $table->double('lat', 10, 0)->nullable();
        $table->double('long', 10, 0)->nullable();
        $table->integer('sort_order')->default(0);
        $table->integer('district_line_id');
        $table->boolean('status')->default(0);
    });
}

public function down()
{
    Schema::dropIfExists('pp_kistochki_district_stations');
}
}
