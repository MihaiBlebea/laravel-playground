<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Section,
    Content
};


class Section extends Model
{
    protected $fillable = [
        'page_id',
        'order',
        'name',
        'template'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
