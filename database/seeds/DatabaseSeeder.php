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
            LevelsTableSeeder::class,
            TitlesTableSeeder::class,
            TeamsTableSeeder::class,
            UsersTableSeeder::class,
            HolidaysTableSeeder::class,
            ServicelinesTableSeeder::class,
            LeavesettingsTableSeeder::class,
            ExpertisesTableSeeder::class,
            DeliverablesTableSeeder::class,
            PermissionsSeeder::class
            // FinancialyearTableSeeder::class
        ]);
        factory(App\Meatpartone::class, 4)->create();
        factory(App\Performance_metrics_details::class, 20)->create();

    }
}
