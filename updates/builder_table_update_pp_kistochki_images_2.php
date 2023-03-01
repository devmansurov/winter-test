<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiImages2 extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_images', function($table)
        {
            $table->string('title', 255)->nullable();
            $table->string('alt', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_images', function($table)
        {
            $table->dropColumn('title');
            $table->string('alt', 255)->nullable(false)->change();
        });
    }
}
