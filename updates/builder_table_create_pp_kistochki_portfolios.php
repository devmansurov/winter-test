<?php

namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiPortfolios extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_portfolios', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('city_id');
            $table->smallInteger('sort_order')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_portfolios');
}
}
