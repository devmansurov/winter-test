<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiPromotions5 extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_promotions', function($table)
        {
            $table->renameColumn('url', 'slug');
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_promotions', function($table)
        {
            $table->renameColumn('slug', 'url');
        });
    }
}
