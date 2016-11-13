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
        return Configuration::getValue('Theme', 'blue');
    }

    public static function getValue($key, $defaultValue = null)
    {
        $config = Configuration::where('key', $key);
        if ($config->first()) {
            return $config->first()->value;
        }

        return $defaultValue;
    }
}
