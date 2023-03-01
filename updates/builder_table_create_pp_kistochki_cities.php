<?php namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiCities extends Migration
{
    public function up()
{
    Schema::create('pp_kistochki_cities', function($table)
    {
        $table->engine = 'InnoDB';
        $table->increments('id')->unsigned();
        $table->integer('y_city_id')->nullable();
        $table->string('title');
        $table->double('lat', 10, 0)->nullable();
        $table->double('long', 10, 0)->nullable();
        $table->string('code')->nullable();
        $table->boolean('status')->default(0);
    });
}

public function down()
{
    Schema::dropIfExists('pp_kistochki_cities');
}
}
