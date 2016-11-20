<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageType extends Model
{


    /**
     * This page belongs to one page type.
     */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }

}
