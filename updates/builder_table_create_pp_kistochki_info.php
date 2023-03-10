<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiInfo extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_info', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('text')->nullable();
            $table->text('text_short')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('seo_id')->nullable();
            $table->boolean('sort_order')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pp_kistochki_info');
    }
}
