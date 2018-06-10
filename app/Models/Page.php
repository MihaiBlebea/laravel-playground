<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Section;


class Page extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'url',
        'template'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
