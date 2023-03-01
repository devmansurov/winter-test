<?php namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiContacts extends Migration
{
    public function up()
{
    Schema::create('pp_kistochki_contacts', function($table)
    {
        $table->engine = 'InnoDB';
        $table->increments('id')->unsigned();
        $table->string('title')->nullable();
        $table->text('description')->nullable();
        $table->string('value');
        $table->smallInteger('status')->default(1);
        $table->smallInteger('type');
    });
}

public function down()
{
    Schema::dropIfExists('pp_kistochki_contacts');
}
}
