<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiImages extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_images', function($table)
        {
            $table->string('alt');
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_images', function($table)
        {
            $table->dropColumn('alt');
        });
    }
}
