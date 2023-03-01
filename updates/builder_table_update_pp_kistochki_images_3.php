<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiImages3 extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_images', function($table)
        {
            $table->dropColumn('key');
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_images', function($table)
        {
            $table->string('key', 255)->nullable();
        });
    }
}
