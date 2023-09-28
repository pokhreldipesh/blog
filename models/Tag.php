<?php namespace Dipesh\Blog\Models;

use Model;

/**
 * Model
 */
class Tag extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'dipesh_blog_tags';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => 'required'
    ];
    
    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->slug = str_slug($model->title, '-');
        });

        self::updating(function($model){
            $model->slug = str_slug($model->title, '-');
        });
    }

    public $belongsToMany = [
        'blogs' => [
            \Dipesh\Blog\Models\Post::class , 
            'table'    => 'dipesh_blog_tag',
            'key'      => 'tag_id',
            'otherKey' => 'post_id'
        ],
    ];
}
