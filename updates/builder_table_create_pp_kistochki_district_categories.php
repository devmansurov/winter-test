<?php namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiDistrictCategories extends Migration
{
    public function up()
{
    Schema::create('pp_kistochki_district_categories', function($table)
    {
        $table->engine = 'InnoDB';
        $table->increments('id')->unsigned();
        $table->string('title');
        $table->string('slug');
        $table->integer('sort_order')->default(0);
        $table->boolean('is_metro')->default(0);
        $table->boolean('status')->default(0);
        $table->json('details')->nullable();
    });
}

public function down()
{
    Schema::dropIfExists('pp_kistochki_district_categories');
}
}
