<?php namespace Dipesh\Blog\Models;

use Model;

/**
 * Model
 */
class Service extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'dipesh_blog_services';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    
    public $attachOne = [
        'feature' => 'System\Models\File'
    ];
    
    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = [];
}
