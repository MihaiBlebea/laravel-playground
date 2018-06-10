<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Section;


class Content extends Model
{
    protected $fillable = [
        'section_id',
        'order',
        'name',
        'template',
        'content'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
