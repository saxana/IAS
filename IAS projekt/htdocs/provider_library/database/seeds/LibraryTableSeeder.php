<?php

use Illuminate\Database\Seeder;
use App\Lib;

class LibraryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Lib::class, 50)->create();
    }
}
