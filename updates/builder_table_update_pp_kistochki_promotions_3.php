<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiPromotions3 extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_promotions', function($table)
        {
            $table->string('img', 255)->nullable();
            $table->string('img_mini', 255);
            $table->dropColumn('images');
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_promotions', function($table)
        {
            $table->dropColumn('img');
            $table->dropColumn('img_mini');
            $table->text('images');
        });
    }
}
