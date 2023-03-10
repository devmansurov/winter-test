<?php namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiDistrictCategoryCities extends Migration
{
    public function up()
{
    Schema::create('pp_kistochki_district_category_cities', function($table)
    {
        $table->engine = 'InnoDB';
        $table->increments('id')->unsigned();
        $table->integer('city_id');
        $table->integer('district_category_id');
        $table->string('color')->nullable();
    });
}

public function down()
{
    Schema::dropIfExists('pp_kistochki_district_category_cities');
}
}
