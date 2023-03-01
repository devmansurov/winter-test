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
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('title');
            $table->integer('order')->nullable();
            $table->boolean('status')->default(false);
            $table->text('images');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pp_kistochki_promotions');
    }
}
