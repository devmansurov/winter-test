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
            $table->string('title')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->double('lat', 10, 0)->nullable();
            $table->double('long', 10, 0)->nullable();
            $table->smallInteger('order')->default(0);
            $table->boolean('status')->default(0);
            $table->string('phone')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('city_id')->default(1);
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
