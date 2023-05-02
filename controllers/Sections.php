<?php namespace Dipesh\Blog\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Sections extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Dipesh.Blog', 'main-menu-item', 'blog-sections');
    }
}
