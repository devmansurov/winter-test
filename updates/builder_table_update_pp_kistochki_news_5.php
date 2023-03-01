<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiNews5 extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_news', function($table)
        {
            $table->boolean('status')->default(false)->change();
            $table->renameColumn('sort_order', 'order');
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_news', function($table)
        {
            $table->boolean('status')->default(null)->change();
            $table->renameColumn('order', 'sort_order');
        });
    }
}
