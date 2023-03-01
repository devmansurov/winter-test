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
            $table->string('img')->nullable();
            $table->string('img_mini')->nullable();
            $table->smallInteger('order')->default(0);
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_portfolios');
}
}
