<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiNews extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_news', function($table)
        {
            $table->boolean('status')->default(false)->change();
            $table->dropColumn('sort_order');
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_news', function($table)
        {
            $table->boolean('status')->default(null)->change();
            $table->boolean('sort_order');
        });
    }
}
