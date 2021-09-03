<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Order_form extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orderforms')->insert([
            'title' => 'Standard delivery (default)',
            'subtitle' => 'Writer with English as a native language1',
            'type' => 'delivery',
            'prize' => 10,
        ]);
        DB::table('orderforms')->insert([
            'title' => 'Express Delivery (2-3 business days)',
            'subtitle' => 'Detailed comments on the key writing aspects of your paper',
            'type' => 'delivery',
            'prize' => 39,
        ]);
        DB::table('orderforms')->insert([
            'title' => 'Next Day delivery',
            'subtitle' => '3 samples of works previously completed by your writer',
            'type' => 'delivery',
            'prize' => 19.99,
        ]);
        DB::table('orderforms')->insert([
            'title' => 'Cover letter',
            'subtitle' => 'Selection of related articles and books, cited in your paper',
            'type' => 'addons',
            'prize' => 100,
        ]);
        DB::table('orderforms')->insert([
            'title' => 'LinkedIn profile',
            'subtitle' => 'Part-by-part delivery of your paper',
            'type' => 'addons',
            'prize' => 75,
        ]);
    }
}
