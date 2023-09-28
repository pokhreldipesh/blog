<?php namespace Dipesh\Blog\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateTagsAddSlugColumn extends Migration
{
    public function up()
    {
        Schema::table('dipesh_blog_tags', function($table)
        {
            $table->text('slug')->after('title')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('dipesh_blog_tags', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
