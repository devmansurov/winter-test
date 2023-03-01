<?php namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiCallbacks extends Migration
{
    public function up()
{
    Schema::create('pp_kistochki_callbacks', function($table)
    {
        $table->engine = 'InnoDB';
        $table->increments('id')->unsigned();
        $table->string('phone')->nullable();
        $table->string('ip')->nullable();
        $table->string('page')->nullable();
        $table->string('user_agent')->nullable();
        $table->integer('city_id')->nullable();
        $table->timestamp('created_at')->nullable();
        $table->timestamp('updated_at')->nullable();
    });
}

public function down()
{
    Schema::dropIfExists('pp_kistochki_callbacks');
}
}
