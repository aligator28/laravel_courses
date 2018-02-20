<?php

use Illuminate\Database\Seeder;

class CampainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $users = factory(Campaign::class, 10)->create();
    }
}
