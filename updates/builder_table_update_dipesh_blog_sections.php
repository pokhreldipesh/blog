<?php namespace Dipesh\Blog\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateDipeshBlogSections extends Migration
{
    public function up()
    {
        Schema::table('dipesh_blog_sections', function($table)
        {
            $table->text('children')->nullable();
            $table->text('extra')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('dipesh_blog_sections', function($table)
        {
            $table->dropColumn('children');
            $table->dropColumn('extra');
        });
    }
}
