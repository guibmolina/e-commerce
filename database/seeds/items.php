<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class items extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'title' => 'açucar',
            'description' => 'açucar refinado',
            'specs' => 'sem gluten',
            'quantity' => '3',
            'price' => '5.80',
        ]);
    }
}
