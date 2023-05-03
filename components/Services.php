<?php

namespace Dipesh\Blog\Components;

use Dipesh\Blog\Models\Service;

class Services extends \Cms\Classes\ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Services',
            'description' => 'Displays available services: .get(), .bySlug()',
        ];
    }

    public function get()
    {
        return Service::with('feature')->get();
    }

    public function bySlug() 
    {
        return Service::with('feature')->where('title', $this->param('slug'))->first();
    }
}
