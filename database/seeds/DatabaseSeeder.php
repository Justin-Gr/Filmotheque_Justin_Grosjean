<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(App\Modeles\Categorie::class, 10)->create();
        factory(App\Modeles\Film::class, 10)->create();
    }
}
