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

        $this->call([

            TeamsTableSeeder::class,
            UsersTableSeeder::class,
        ]);
        // factory(App\Meatpartone::class, 4)->create();
        // factory(App\Performance_metrics_details::class, 20)->create();

        // factory(App\Meatparttwo::class, 1)->create();
        // factory(App\Parttwo_performance::class, 5)->create();
    }
}
