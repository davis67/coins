<?php

use Illuminate\Database\Seeder;
use App\Financialyear;
class FinancialyearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            [
                'year' =>'2019-2020', 
                'start_date' => '2019-01-01',
                'end_date' => '2019-12-31'
            ],
            [
                'year' =>'2020-2021', 
                'start_date' => '2020-01-01',
                'end_date' => '2020-12-31'
            ],
            [
                'year' =>'2021-2022', 
                'start_date' => '2021-01-01',
                'end_date' => '2021-12-31'
            ]
          
        ];
        foreach($levels as $level){
            Financialyear::create($level);
        }
    }
}
