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
            'name' => 'cards-title',
            'template' => 'sections.title'
        ],
        [
            'page_id' => 1,
            'order' => 2,
            'name' => 'cards',
            'template' => 'sections.cards'
        ],
        [
            'page_id' => 1,
            'order' => 3,
            'name' => 'logos-title',
            'template' => 'sections.title'
        ],
        [
            'page_id' => 1,
            'order' => 4,
            'name' => 'logos',
            'template' => 'sections.logos'
        ],
        [
            'page_id' => 1,
            'order' => 5,
            'name' => 'benefits-title',
            'template' => 'sections.title'
        ],
        [
            'page_id' => 1,
            'order' => 6,
            'name' => 'benefits',
            'template' => 'sections.benefits'
        ],
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
