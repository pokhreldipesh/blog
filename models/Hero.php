<?php namespace Dipesh\Blog\Models;

use Model;

/**
 * Model
 */
class Hero extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'dipesh_blog_hero';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => 'required',
        'description' => 'required'
    ];
    
    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];

    public $attachOne = [
        'feature' => 'System\Models\File'
    ];
}
