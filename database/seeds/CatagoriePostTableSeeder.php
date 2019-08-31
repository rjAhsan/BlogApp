<?php

use Illuminate\Database\Seeder;

class CatagoriePostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PostCatagorie::class,20)->create();

    }
}
