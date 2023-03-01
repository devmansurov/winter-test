<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePpKistochkiNews extends Migration
{
    public function up()
    {
        Schema::create('pp_kistochki_news', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('text_short')->nullable();
            $table->text('text')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pp_kistochki_news');
    }
}
