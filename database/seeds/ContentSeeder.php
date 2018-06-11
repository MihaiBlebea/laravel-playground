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

        // Section id 2

        [
            'section_id' => 2,
            'order'      => 0,
            'name'       => 'card-title',
            'template'   => 'contents._title',
            'content'    => 'This is the contents title'
        ],

        // Section id 3

        [
            'section_id' => 3,
            'order'      => 0,
            'name'       => 'card',
            'template'   => 'contents._card',
            'content'    => 'bar'
        ],
        [
            'section_id' => 3,
            'order'      => 1,
            'name'       => 'card',
            'template'   => 'contents._card',
            'content'    => 'foo'
        ],
        [
            'section_id' => 3,
            'order'      => 2,
            'name'       => 'card',
            'template'   => 'contents._card',
            'content'    => 'foo bar'
        ],

        // Section id 4

        [
            'section_id' => 4,
            'order'      => 0,
            'name'       => 'logo-title',
            'template'   => 'contents._title',
            'content'    => 'This is the logos title'
        ],

        // Section id 5

        [
            'section_id' => 5,
            'order'      => 0,
            'name'       => 'logo',
            'template'   => 'contents._logo',
            'content'    => 'x'
        ],
        [
            'section_id' => 5,
            'order'      => 1,
            'name'       => 'logo',
            'template'   => 'contents._logo',
            'content'    => 'w'
        ],
        [
            'section_id' => 5,
            'order'      => 2,
            'name'       => 'logo',
            'template'   => 'contents._logo',
            'content'    => 'z'
        ],

        // Section id 6

        [
            'section_id' => 6,
            'order'      => 0,
            'name'       => 'benefit-title',
            'template'   => 'contents._title',
            'content'    => 'This is the benefits title'
        ],

        // Section id 7

        [
            'section_id' => 7,
            'order'      => 0,
            'name'       => 'benefit-title',
            'template'   => 'contents._benefit-title',
            'content'    => 'This is title 1'
        ],
        [
            'section_id' => 7,
            'order'      => 0,
            'name'       => 'benefit-content',
            'template'   => 'contents._benefit-content',
            'content'    => 'This is the content 1'
        ],
        [
            'section_id' => 7,
            'order'      => 1,
            'name'       => 'benefit-title',
            'template'   => 'contents._benefit-title',
            'content'    => 'This is title 2'
        ],
        [
            'section_id' => 7,
            'order'      => 1,
            'name'       => 'benefit-content',
            'template'   => 'contents._benefit-content',
            'content'    => 'This is the content 2'
        ],
        [
            'section_id' => 7,
            'order'      => 2,
            'name'       => 'benefit-title',
            'template'   => 'contents._benefit-title',
            'content'    => 'This is title 3'
        ],
        [
            'section_id' => 7,
            'order'      => 2,
            'name'       => 'benefit-content',
            'template'   => 'contents._benefit-content',
            'content'    => 'This is the content 3'
        ],

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
