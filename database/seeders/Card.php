<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Card extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cards = [
            [
                'id' => '1',
                'name' => 'Admin\'s Card',
                'number' => '0000 0000 0000 0000',
                'expired_month' => '12',
                'expired_year' => '2050',
                'cvc_cvv' => '777',
                'country' => 'Indonesia',
                'zip' => '11610 ',
            ],
        ];

        DB::table('cards')->insert($cards);
    }
}
