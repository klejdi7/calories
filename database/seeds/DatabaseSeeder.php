<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('UserTableSeeder');

        $this->command->info('User table seeded!');
    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        $user = array('email' => 'admin@admin.com', 'password' => 'admin', 'name' => 'admin', 'role' => 1);
     
        $roles = [
            ['id' => 1, 'name' => 'Admin', 'guard_name' => 'web'],
            ['id' => 2, 'name' => 'Default', 'guard_name' => 'web'],
        ];
        $permissions = [
            ['name'=>'set_calories', 'guard_name'=>'web'],
            ['name'=>'edit_meal', 'guard_name'=>'web'],
            ['name'=>'delete_meal', 'guard_name'=>'web'],
        ];
        $model = [
            ['role_id'=> 1, 'model_type'=>'App/User', 'model_id' => 1],
            ['role_id'=> 2, 'model_tyoe'=>'App/User', 'model_id' => 2],
        ];

        $role_permission = [
            ['permission_id'=> 1, 'role_id'=> 1],
            ['permission_id'=> 2, 'role_id'=> 2],
            ['permission_id'=> 3, 'role_id'=> 2],
        ];

        $model_permissions = [
            ['permission_id'=> 1, 'model_type'=>'App/User', 'model_id' => 1],
            ['permission_id'=> 2, 'model_type'=>'App/User', 'model_id' => 1],
        ];
        DB::table('roles')->insert($roles);
        DB::table('permissions')->insert($permissions);
        DB::table('model_has_roles')->insert($model);
        DB::table('model_has_permissions')->insert($model_permissions);
        DB::table('role_has_permissions')->insert($role_permission);
        DB::table('users')->insert($user);

    }

}