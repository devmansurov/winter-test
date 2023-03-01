<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiPromotions4 extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_promotions', function($table)
        {
            $table->string('url', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_promotions', function($table)
        {
            $table->dropColumn('url');
        });
    }
}
