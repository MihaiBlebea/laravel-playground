<?php

namespace App\Observers;

use App\Models\Page;

class PageObserver
{
    public function created(Page $page)
    {
        $page->update([
            'slug' => str_slug($page->name, '-')
        ]);
    }
}
