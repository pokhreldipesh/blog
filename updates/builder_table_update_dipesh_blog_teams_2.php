<?php namespace Dipesh\Blog\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateDipeshBlogTeams2 extends Migration
{
    public function up()
    {
        Schema::table('dipesh_blog_teams', function($table)
        {
            $table->integer('sort_order')->nullable()->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('dipesh_blog_teams', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
