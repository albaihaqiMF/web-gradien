<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'super' => [
                // post control
                'create post',
                'read post',
                'update post',
                'delete post',
                // project control
                'create project',
                'read project',
                'update project',
                'delete project',
                // user control
                'create users',
                'read users',
                'update users',
                'delete users',
                // settings control
                'update settings'
            ],
            'admin' => [
                'read post',
                'update post',
                'delete post',

                'create project',
                'read project',
                'update project',
                'delete project',

                'create users',
                'read users',
                'update users',
                'delete users'
            ],
            'member' => [
                'read post',
                'update post',
                'delete post',
                'read project',
                'update project',
            ],
            'user' => [
                'create post',
                'read post',
                'read project',
                'create users',
                'read users',
                'update users',
            ]
        ];

        collect($roles)->each(function ($permissions, $role) {
            $role = Role::findOrCreate($role, 'web');
            collect($permissions)->each(function ($permission) use ($role) {
                $permission = Str::snake($permission);
                $role->permissions()->save(Permission::findOrCreate($permission, 'web'));
            });
        });
    }

}
