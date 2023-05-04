<?php namespace Dipesh\Blog\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateDipeshBlogTeams extends Migration
{
    public function up()
    {
        Schema::table('dipesh_blog_teams', function($table)
        {
            $table->text('extra')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('dipesh_blog_teams', function($table)
        {
            $table->dropColumn('extra');
        });
    }
}
