<?php

namespace Dipesh\Blog\Components;

use Dipesh\Blog\Models\Team;


class MyTeams extends \Cms\Classes\ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'My Teams',
            'description' => 'Displays a my teams. available methods are: .get(), bySlug()'
        ];
    }

    public function get()
    {
        return Team::orderBy('sort_order', 'asc')->get();
    }

    public function bySlug()
    {
        return Team::where('title', $this->param('slug'))->first();
    }
}
