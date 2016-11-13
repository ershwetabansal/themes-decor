<?php

use Illuminate\Database\Seeder;

class ConfigurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Configuration::create([
            'key'   => 'name',
            'value' => Config('app.name')
        ]);

        \App\Configuration::create([
            'key'   => 'theme',
            'value' => 'blue',
            'possible_values'   =>  'red,blue,green'
        ]);

        \App\Configuration::create([
            'key'   => 'content',
            'value' => 'Themes & Decor is a boutique events company based in Meerut that specialises ' .
                'in weddings, private parties, kids\' parties and corporate events.'
        ]);
    }
}
