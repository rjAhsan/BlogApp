<?php

use Illuminate\Database\Seeder;

class MediaPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PostMedia::class,20)->create();

    }
}
