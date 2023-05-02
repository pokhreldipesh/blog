<?php

namespace Dipesh\Blog\Components;

use Dipesh\Blog\Models\Hero;


class HeroSection extends \Cms\Classes\ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Hero Section',
            'description' => 'Displays a hero section. Available methods are: .get()'
        ];
    }

    public function get()
    {
        return Hero::with('feature')->first();
    }
}
