<?php

namespace Dipesh\Blog;

use System\Classes\PluginBase;
use Dipesh\Blog\Models\Section;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Dipesh\Blog\Components\Posts' => 'blogPost',
            'Dipesh\Blog\Components\HeroSection' => 'heroSection',
            'Dipesh\Blog\Components\MyTeams' => 'myTeams',
            'Dipesh\Blog\Components\PageSection' => 'pageSection',
            'Dipesh\Blog\Components\Services' => 'services',
        ];
    }
    public function boot()
    {
        Section::extend(function($model) {
            $model->bindEvent('model.afterFetch', function() use ($model) {
                //dd($model->children);
            });
        });
    }
    public function registerSettings()
    {
    }
}
