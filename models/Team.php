<?php namespace Dipesh\Blog\Models;

use Model;

/**
 * Model
 */
class Team extends Model
{
    use \Winter\Storm\Database\Traits\Validation;
    
    use \Winter\Storm\Database\Traits\Sortable;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'dipesh_blog_teams';

    const SORT_ORDER = 'sort_order';
    
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    
    /**
     * @var array Attribute names to encode and decode using JSON.
     */
    public $jsonable = ['extra'];
}
