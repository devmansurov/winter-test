<?php

namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiTags extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_tags', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->boolean('status')->default(1);
            $table->smallInteger('type');
            $table->integer('tag_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

public function down()
{
    Schema::dropIfExists('pp_kistochki_tags');
}
}
