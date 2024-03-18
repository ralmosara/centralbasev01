<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'albert@doe.com',
        ]);
        $user2  = User::factory()->create([
            'name' => 'viewer',
            'email' => 'viewer@doe.com',
        ]);
        $user3  = User::factory()->create([
            'name' => 'normaluser',
            'email' => 'normaluser@doe.com',
        ]);

        $role = Role::create(['name'=>'Admin']);
        $user->assignRole($role);

        $role1 = Role::create(['name'=>'Viewer']);
        $user2->assignRole($role1);
    }
}
