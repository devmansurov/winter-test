<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiPromotions2 extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_promotions', function($table)
        {
            $table->integer('sort_order')->nullable()->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_promotions', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
