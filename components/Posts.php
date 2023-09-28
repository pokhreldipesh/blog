<?php

namespace Dipesh\Blog\Components;

use Dipesh\Blog\Models\Post;
use Dipesh\Blog\Models\Hero;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;



class Posts extends \Cms\Classes\ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Blog Posts',
            'description' => 'Displays a collection of blog posts. Available methods are : .posts(), .post(), byId(), byTag()'
        ];
    }

    public function defineProperties()
    {
        return [
            'maxItems' => [
                    'title'             => 'Max items',
                    'description'       => 'The most amount of todo items allowed',
                    'default'           => 10,
                    'type'              => 'string',
                    'validationPattern' => '^[0-9]+$',
                    'validationMessage' => 'The Max Items property can contain only numeric symbols'
            ],
            'postPage' => [
                'title' => 'Post page',
                'type' => 'dropdown',
                'default' => 'blog/post'
            ],
            'published' => [
                'title' => 'Display Published',
                'type' => 'checkbox',
                'default' => true
            ]
        ];
    }

    public function getPostPageOptions()
    {
        return Post::orderBy('title')->lists('title');
    }

    public function posts()
    {
        return Post::with('feature')
        ->where('published', $this->property('published'))
        ->orderBy(DB::raw('date(created_at)'), 'desc')
        ->paginate($this->property('maxItems'));
    }

    public function post() {

        return Post::with('feature')->where('title', $this->param('slug'))->first();
    }

    public function byId() {

        return Post::with('feature')->with('tags')->where('id', $this->param('id'))->first();
    }

    public function byTag() {
        return Post::query()
        ->with('feature')
        ->with('tags')
        ->where('published', $this->property('published'))
        ->orderBy(DB::raw('date(created_at)'), 'desc')
        ->join('dipesh_blog_post_tag', 'dipesh_blog_posts.id', '=', 'dipesh_blog_post_tag.post_id')
        ->join('dipesh_blog_tags', 'dipesh_blog_post_tag.tag_id', '=', 'dipesh_blog_tags.id')
        ->where('dipesh_blog_tags.slug', $this->param('tag'))->get();
    }
}
