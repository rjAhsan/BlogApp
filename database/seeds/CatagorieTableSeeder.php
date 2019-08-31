<?php

use Illuminate\Database\Seeder;

class CatagorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Catagorie::class,5)->create();

    }
}
