<?php namespace Dipesh\Blog;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Dipesh\Blog\Components\Posts' => 'blogPost',
            'Dipesh\Blog\Components\HeroSection' => 'heroSection',
            'Dipesh\Blog\Components\MyTeams' => 'myTeams',
            'Dipesh\Blog\Components\PageSection' => 'pageSection'

        ];
    }


    public function registerSettings()
    {
    }
}
