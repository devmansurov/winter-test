<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiPromotions extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_promotions', function($table)
        {
            $table->integer('seo_id')->nullable();
            $table->boolean('status')->default(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_promotions', function($table)
        {
            $table->dropColumn('seo_id');
            $table->boolean('status')->default(null)->change();
        });
    }
}
