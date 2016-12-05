<?php

use Illuminate\Database\Seeder;
use App\Ksiazka;

class KsiazkiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ksiazka::class, 50)-> ->create();
    }
}
