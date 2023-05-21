<?php namespace Dipesh\Blog\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateDipeshBlogSections1 extends Migration
{
    public function up()
    {
        Schema::table('dipesh_blog_sections', function($table)
        {
            $table->json('children')->nullable()->change();
            $table->json('extra')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('dipesh_blog_sections', function($table)
        {
            $table->text('children')->change();
            $table->text('extra')->change();
        });
    }
}
