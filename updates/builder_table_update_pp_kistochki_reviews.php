<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiReviews extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_reviews', function($table)
        {
            $table->boolean('status')->default(false);
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_reviews', function($table)
        {
            $table->dropColumn('status');
        });
    }
}
