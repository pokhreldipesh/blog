<?php namespace Dipesh\Blog\Models;

use Model;

/**
 * Model
 */
class Post extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    
    use \Winter\Storm\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'dipesh_blog_posts';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => 'required',
        'summary' => 'required'
    ];
    
    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];

    public $attachOne = [
        'feature' => 'System\Models\File'
    ];

    public $belongsToMany = [
        'tags' => [
            \Dipesh\Blog\Models\Tag::class , 
            'table'    => 'dipesh_blog_post_tag',
            'key'      => 'post_id',
            'otherKey' => 'tag_id'
        ],
    ];

    public function scopeApplyTags($query, $type)
    {
        return $query
                    ->leftJoin('dipesh_blog_post_tag', 'dipesh_blog_posts.id', '=', 'dipesh_blog_post_tag.post_id')
                    ->whereIn('tag_id', $type);
    }
}
