<?php

namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiPrices extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_prices', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('master')->nullable();
            $table->integer('master_night')->nullable();
            $table->integer('pro_master')->nullable();
            $table->integer('pro_master_night')->nullable();
            $table->integer('super_master')->nullable();
            $table->integer('super_master_night')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_prices');
}
}
