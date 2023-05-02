<?php namespace Dipesh\Blog\Models;

use Model;

/**
 * Model
 */
class Section extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    
    use \Winter\Storm\Database\Traits\Sluggable;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'dipesh_blog_sections';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => 'required'
    ];
    
    protected $slugs = ['slug' => 'title'];

    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];

    public $attachOne = [
        'feature' => 'System\Models\File'
    ];
}
