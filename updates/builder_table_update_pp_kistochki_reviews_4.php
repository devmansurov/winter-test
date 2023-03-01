<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiReviews4 extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_reviews', function($table)
        {
            $table->dropColumn('avatar');
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_reviews', function($table)
        {
            $table->string('avatar', 255)->nullable();
        });
    }
}
