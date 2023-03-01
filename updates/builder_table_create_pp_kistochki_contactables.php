<?php namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiContactables extends Migration
{
    public function up()
{
    Schema::create('pp_kistochki_contactables', function($table)
    {
        $table->engine = 'InnoDB';
        $table->increments('id')->unsigned();
        $table->integer('contact_id');
        $table->integer('contactable_id');
        $table->string('contactable_type');
    });
}

public function down()
{
    Schema::dropIfExists('pp_kistochki_contactables');
}
}
