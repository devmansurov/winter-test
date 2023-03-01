<?php namespace Pp\Kistochki\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiJobs extends Migration
{
    public function up()
{
    Schema::create('pp_kistochki_jobs', function($table)
    {
        $table->engine = 'InnoDB';
        $table->increments('id')->unsigned();
        $table->string('title');
        $table->string('slug');
        $table->text('excerpt')->nullable();
        $table->text('description')->nullable();
        $table->integer('salary')->default(0);
        $table->boolean('order')->default(0);
        $table->integer('link_weight')->default(0);
        $table->boolean('status')->default(0);
        $table->integer('city_id');
        $table->integer('seo_id')->nullable();
        $table->timestamp('created_at')->nullable();
        $table->timestamp('updated_at')->nullable();
        $table->timestamp('deleted_at')->nullable();
    });
}

public function down()
{
    Schema::dropIfExists('pp_kistochki_jobs');
}
}
