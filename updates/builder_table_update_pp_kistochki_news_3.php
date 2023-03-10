<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiNews3 extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_news', function($table)
        {
            $table->boolean('status')->default(false)->change();
            $table->integer('sort_order')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_news', function($table)
        {
            $table->boolean('status')->default(null)->change();
            $table->integer('sort_order')->default(null)->change();
        });
    }
}
