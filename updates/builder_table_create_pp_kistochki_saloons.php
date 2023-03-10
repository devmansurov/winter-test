<?php

namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiSaloons extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_saloons', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('yclients_id')->unsigned()->nullable();
            $table->string('schedule')->nullable();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('slug');
            $table->string('address')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->double('lat', 10, 0)->nullable();
            $table->double('long', 10, 0)->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('bookable')->default(0);
            $table->boolean('status')->default(0);
            $table->integer('district_id')->nullable();
            $table->integer('city_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_saloons');
}
}
