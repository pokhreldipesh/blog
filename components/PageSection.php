<?php

namespace Dipesh\Blog\Components;

use Dipesh\Blog\Models\Section;
use Illuminate\Pagination\LengthAwarePaginator;


class PageSection extends \Cms\Classes\ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Page Section',
            'description' => 'Displays a page section. available methods: .get()'
        ];
    }

    public function defineProperties()
    {
        return [
            'section' => [
                'title' => 'Select Section',
                'type' => 'dropdown',
                'default' => ''
            ]
        ];
    }

    public function getSectionOptions()
    {
        return Section::orderBy('title')->lists('title');
    }

    public function get()
    {
        return Section::with('feature')->where('title', $this->property('section'))->first();
    }
}
