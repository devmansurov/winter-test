<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiNews4 extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_news', function($table)
        {
            $table->boolean('status')->default(false)->change();
            $table->integer('sort_order')->nullable(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_news', function($table)
        {
            $table->boolean('status')->default(null)->change();
            $table->integer('sort_order')->nullable()->change();
        });
    }
}
