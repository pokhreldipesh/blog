<?php namespace Dipesh\Blog\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Teams extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController', 
        'Backend\Behaviors\FormController', 
        \Backend\Behaviors\ReorderController::class,
    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Dipesh.Blog', 'main-menu-item', 'blog-teams');
    }

    // public function listExtendQuery($query)
    // {
    //     dd($query->toSql());
    //     $query->withTrashed();
    // }
}
