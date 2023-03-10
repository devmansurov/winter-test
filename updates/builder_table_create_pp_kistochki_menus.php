<?php namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiMenus extends Migration
{
    public function up()
{
    Schema::create('pp_kistochki_menus', function($table)
    {
        $table->engine = 'InnoDB';
        $table->increments('id')->unsigned();
        $table->string('title');
        $table->string('menu_title');
        $table->string('slug');
        $table->text('excerpt')->nullable();
        $table->text('description')->nullable();
        $table->boolean('sort_order')->default(0);
        $table->boolean('status')->default(0);
        $table->integer('seo_id')->nullable();
        $table->smallInteger('column')->default(0);
    });
}

public function down()
{
    Schema::dropIfExists('pp_kistochki_menus');
}
}
