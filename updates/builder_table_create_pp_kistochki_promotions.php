<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiPromotions extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_promotions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->integer('sort_order')->default(0);
            $table->integer('city_id');
            $table->text('text');
            $table->string('sub_title', 255);
            $table->integer('seo_id')->nullable();
            $table->boolean('status')->default(false)->change();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pp_kistochki_promotions');
    }
}
