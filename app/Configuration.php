<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'value',
    ];

    public static function theme()
    {
    	$theme = Configuration::where('key', 'Theme');

    	if ($theme->first()) {
    		return $theme->first()->value;
    	}

    	return 'red';
    }
}
