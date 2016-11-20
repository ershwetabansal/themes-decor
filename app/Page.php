<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'slug', 'title', 'content', 'page_type_id', 'description'
    ];

    /**
     * This page belongs to one page type.
     */
    public function pageType()
    {
        return $this->belongsTo(PageType::class);
    }

}
