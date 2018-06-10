<?php

use Illuminate\Database\Seeder;
use App\Models\Section;


class SectionSeeder extends Seeder
{
    private $sections = [
        [
            'page_id' => 1,
            'order' => 0,
            'name' => 'main-hero',
            'template' => 'sections.main-hero'
        ],
        [
            'page_id' => 1,
            'order' => 1,
            'name' => 'cards',
            'template' => 'sections.cards'
        ]
    ];

    public function run()
    {
        foreach($this->sections as $section)
        {
            Section::create([
                'page_id'  => $section['page_id'],
                'order'    => $section['order'],
                'name'     => $section['name'],
                'template' => $section['template']
            ]);
        }
    }
}
