<?php

use Illuminate\Database\Seeder;
use App\Bunch;

class BunchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(Bunch::class, 10)->create();
    }
}
