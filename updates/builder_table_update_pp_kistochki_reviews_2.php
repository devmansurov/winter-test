<?php namespace Pp\Kistochki\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePpKistochkiReviews2 extends Migration
{
    public function up()
    {
        Schema::table('pp_kistochki_reviews', function($table)
        {
            $table->string('avatar')->nullable();
            $table->renameColumn('user', 'name');
            $table->renameColumn('review', 'text');
        });
    }
    
    public function down()
    {
        Schema::table('pp_kistochki_reviews', function($table)
        {
            $table->dropColumn('avatar');
            $table->renameColumn('name', 'user');
            $table->renameColumn('text', 'review');
        });
    }
}
