<?php namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiSliders extends Migration
{
    public function up()
{
    Schema::create('pp_kistochki_sliders', function($table)
    {
        $table->engine = 'InnoDB';
        $table->increments('id')->unsigned();
        $table->string('title');
        $table->string('slug');
        $table->string('subtitle')->nullable();
        $table->text('excerpt')->nullable();
        $table->text('description')->nullable();
        $table->string('btn_title')->nullable();
        $table->string('hit_title')->nullable();
        $table->string('url')->nullable();
        $table->boolean('is_link')->default(0);
        $table->boolean('status')->default(0);
        $table->integer('sort_order')->default(0);
        $table->tinyInteger('type');
        $table->integer('city_id');
        $table->integer('promotion_id')->nullable();
        $table->integer('promotion_category_id')->nullable();
        $table->timestamp('created_at')->nullable();
        $table->timestamp('updated_at')->nullable();
        $table->timestamp('deleted_at')->nullable();
    });
}

public function down()
{
    Schema::dropIfExists('pp_kistochki_sliders');
}
}
