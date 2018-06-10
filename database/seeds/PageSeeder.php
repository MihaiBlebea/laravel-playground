<?php

use Illuminate\Database\Seeder;
use App\Models\Page;


class PageSeeder extends Seeder
{
    private $pages = [
        [
            'name'     => 'homepage',
            'url'      => '/homepage',
            'template' => 'pages.homepage'
        ]
    ];

    public function run()
    {
        foreach($this->pages as $page)
        {
            Page::create([
                'name'     => $page['name'],
                'url'      => $page['url'],
                'template' => $page['template'],
            ]);
        }
    }
}
