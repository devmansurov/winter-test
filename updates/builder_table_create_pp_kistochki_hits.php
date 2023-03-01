<?php

namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiHits extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_hits', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->integer('link_weight')->default(1);
            $table->integer('price')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('city_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_hits');
}
}
