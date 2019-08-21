<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            ['id'=>1,'staffId'=>'AHC/574/18','name'=>'Vivacious Admin','gender'=>'male','email'=>'davis.agaba@ahcul.com','password' => bcrypt('secret'),'mobilePhone'=>'+256414751506','alternativePhone'=>'+256414751506','team_id'=>1,'reportsTo'=>'Edgart Katarahweire','userStatus'=>'Active','created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10'],
            ['id'=>2,'staffId'=>'AHC/574/19','name'=>'Vivacious Tester','gender'=>'male','email'=>'info@ahcul.com','password' => bcrypt('m!p@ssW0rd'),'mobilePhone'=>'+256414751506','alternativePhone'=>'+256414751506','team_id'=>1,'reportsTo'=>'Edgart Katarahweire','userStatus'=>'Active','created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10'],
            ];
        foreach($users as $user){

            $registereduser = User::create($user);
            $registereduser->titles()->attach(15);
        }

        $demo_chief_of_staff = ['id'=>3,'staffId'=>'AHC/57754/18','name'=>'Demo Chief Of Staff','gender'=>'male','email'=>'cos@ahcul.com','password' => bcrypt('secret'),'mobilePhone'=>'+256414751506','alternativePhone'=>'+256414751506','team_id'=>1,'reportsTo'=>'Edgart Katarahweire','userStatus'=>'Active','created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10'];

        $registercos = User::create($demo_chief_of_staff);
            $registercos->titles()->attach(6);

        $assistant_md = ['id'=>4,'staffId'=>'AHC/5754/18','name'=>'Demo Hod','gender'=>'male','email'=>'hod@ahcul.com','password' => bcrypt('secret'),'mobilePhone'=>'+256414751506','alternativePhone'=>'+256414751506','team_id'=>1,'reportsTo'=>'Edgart Katarahweire','userStatus'=>'Active','created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10'];

        $democeo = User::create($assistant_md);
            $democeo->titles()->attach(3);
    }
}
