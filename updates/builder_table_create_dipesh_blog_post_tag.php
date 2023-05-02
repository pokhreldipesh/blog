<?php namespace Dipesh\Blog\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDipeshBlogPostTag extends Migration
{
    public function up()
    {
        Schema::create('dipesh_blog_post_tag', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('post_id');
            $table->integer('tag_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dipesh_blog_post_tag');
    }
}
