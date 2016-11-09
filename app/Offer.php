<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description', 'valid_until', 'url',
    ];

    protected $dates = ['valid_until'];
}
