<?php 
namespace Dipesh\Blog\Controllers;

use Backend\Classes\Controller;
use Dipesh\Blog\Models\Hero as HeroModel;
use BackendMenu;

class Hero extends Controller
{
    public $implement = [        'Backend\Behaviors\FormController'    ];
    
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Dipesh.Blog', 'main-menu-item', 'side-menu-item');
    }

    public function create($context = null) {

        if(request()->slug == 'dipesh/blog/hero/create' && HeroModel::count() > 0) {
            
            return redirect()->to('backend/dipesh/blog/hero/update/1');
        }

        parent::create();
    }

}
