<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;


class PageController extends Controller
{
    public function renderPage(Page $page)
    {
        $contents = collect([]);
        foreach($page->sections as $section)
        {
            $contents[$section->name] = [
                'section'  => $section,
                'contents' => collect([])
            ];
            $ordered_contents = $section->contents->sortBy('order');
            foreach($ordered_contents as $content)
            {
                $contents[$section->name]['contents']->push($content);
            }
        }
        // dd($contents);
        return  view($page->template)->with([
            'contents' => $contents
        ]);
    }
}
