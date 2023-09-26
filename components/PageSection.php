<?php

namespace Dipesh\Blog\Components;

use Dipesh\Blog\Models\Section;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class PageSection extends \Cms\Classes\ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Page Section',
            'description' => 'Displays a page section. available methods: .get(), .bySlug'
        ];
    }

    public function defineProperties()
    {
        return [
            'section' => [
                'title' => 'Section',
                'type' => 'dropdown',
                'default' => ''
            ],
            'subSection' => [
                'title' => 'Sub Section',
                'type' => 'dropdown',
                'depends'     => ['section'],
                'default' => ''
            ]
        ];
    }

    public function getSectionOptions()
    {
        $list = Section::orderBy('title')->lists('title', 'id');

        return ['' => 'Select Section']+ $list;
    }

    public function getSubSectionOptions()
    {
        $section = request()->input('section');

        
        if(empty($section)) {
            
            return [];
        }

        $section = Section::orderBy('title')
        ->where('id', (int)$section)
        ->first()->children;


        return collect($section)->map(function($val, $index) {
                return $val['title'];
            })->prepend("Select Sub Section")->toArray();
    }

    public function get()
    {
        $section =  Section::with('feature')
        ->where('id', $this->property('section'))
        ->first();
        
        if ($subSection = (int)$this->property('subSection')) {
            return (new Section())->forceFill($section->children[(int)$subSection - 1]);
        }

        return $section;
    }

    public function bySlug() 
    {
        return Section::with('feature')->where('title', $this->param('slug'))->first();
    }
}
