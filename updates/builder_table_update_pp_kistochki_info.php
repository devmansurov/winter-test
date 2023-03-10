<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiInfo extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_info', function($table)
        {
            $table->boolean('sort_order')->default(false)->change();
            $table->boolean('status')->default(false)->change();
            $table->dropColumn('city_id');
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_info', function($table)
        {
            $table->boolean('sort_order')->default(null)->change();
            $table->boolean('status')->default(null)->change();
            $table->integer('city_id')->nullable();
        });
    }
}
