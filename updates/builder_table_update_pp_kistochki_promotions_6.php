<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiPromotions6 extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_promotions', function($table)
        {
            $table->string('img_mini', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_promotions', function($table)
        {
            $table->string('img_mini', 255)->nullable(false)->change();
        });
    }
}
