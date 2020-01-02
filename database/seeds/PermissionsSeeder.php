<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permission;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach ($users as $user){
            $id = $user->id;
            $permissions =[
                'canCreateOpportunity'=> false,
                'canEditOpportunity'=> false,
                'canIndexOpportunity'=> false,
                'canDeleteOpportunity'=> false,
                'canCreateContact'=> false,
                'canEditContact'=> false,
                'canIndexContact'=> false,
                'canDeleteContact'=> false,
                "user_id" => $id
            ];

            Permission::create($permissions);
        }

    }
}
