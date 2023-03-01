<?php

namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiReviews extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_reviews', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('service')->nullable();
            $table->string('user')->nullable();
            $table->double('rating', 10, 0)->nullable();
            $table->text('review')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_reviews');
}
}
