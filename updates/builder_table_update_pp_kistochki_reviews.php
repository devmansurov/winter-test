<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiReviews extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_reviews', function($table)
        {
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_reviews', function($table)
        {
            $table->dropColumn('deleted_at');
        });
    }
}
