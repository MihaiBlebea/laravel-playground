<?php

use Illuminate\Database\Seeder;
use App\Models\Content;


class ContentSeeder extends Seeder
{
    private $contents = [
        [
            'section_id' => 1,
            'order'      => 0,
            'name'       => 'title',
            'template'   => 'contents._title',
            'content'    => 'This is the main title'
        ],
        [
            'section_id' => 1,
            'order'      => 1,
            'name'       => 'subtitle',
            'template'   => 'contents._subtitle',
            'content'    => 'This is the subtitle'
        ],
        [
            'section_id' => 1,
            'order'      => 2,
            'name'       => 'button',
            'template'   => 'contents._button',
            'content'    => 'Click here'
        ],
        [
            'section_id' => 2,
            'order'      => 0,
            'name'       => 'card',
            'template'   => 'contents._card',
            'content'    => 'bar'
        ],
        [
            'section_id' => 2,
            'order'      => 1,
            'name'       => 'card',
            'template'   => 'contents._card',
            'content'    => 'foo'
        ],
        [
            'section_id' => 2,
            'order'      => 2,
            'name'       => 'card',
            'template'   => 'contents._card',
            'content'    => 'foo bar'
        ]
    ];

    public function run()
    {
        foreach($this->contents as $content)
        {
            Content::create([
                'section_id' => $content['section_id'],
                'order'      => $content['order'],
                'name'       => $content['name'],
                'template'   => $content['template'],
                'content'    => $content['content'],
            ]);
        }
    }
}
