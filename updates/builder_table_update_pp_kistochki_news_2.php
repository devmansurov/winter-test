<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiNews2 extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_news', function($table)
        {
            $table->integer('sort_order')->nullable();
            $table->boolean('status')->default(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_news', function($table)
        {
            $table->dropColumn('sort_order');
            $table->boolean('status')->default(null)->change();
        });
    }
}
