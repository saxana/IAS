<?php

use Illuminate\Database\Seeder;
use App\Magazine;

class MagazinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Magazine::class, 50)->create();
    }
}
