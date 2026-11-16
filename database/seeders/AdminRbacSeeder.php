<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Helpers\ActivityLogger;

class AdminRbacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Define Permissions by Module
        $modules = [
            'Users Management' => [
                ['name' => 'View Users', 'slug' => 'users.view', 'desc' => 'Can view list of all users and profiles'],
                ['name' => 'Create Users', 'slug' => 'users.create', 'desc' => 'Can add new administrators and users'],
                ['name' => 'Edit Users', 'slug' => 'users.edit', 'desc' => 'Can update user profiles and status'],
                ['name' => 'Delete Users', 'slug' => 'users.delete', 'desc' => 'Can delete or deactivate user accounts'],
            ],
            'Roles Management' => [
                ['name' => 'View Roles', 'slug' => 'roles.view', 'desc' => 'Can view roles and assigned privileges'],
                ['name' => 'Create Roles', 'slug' => 'roles.create', 'desc' => 'Can create new administrative roles'],
                ['name' => 'Edit Roles', 'slug' => 'roles.edit', 'desc' => 'Can edit role permissions and details'],
                ['name' => 'Delete Roles', 'slug' => 'roles.delete', 'desc' => 'Can remove non-system roles'],
            ],
            'Permissions Management' => [
                ['name' => 'View Permissions', 'slug' => 'permissions.view', 'desc' => 'Can view permissions matrix'],
                ['name' => 'Assign Permissions', 'slug' => 'permissions.assign', 'desc' => 'Can assign permissions to roles'],
            ],
            'Audit & Activity Logs' => [
                ['name' => 'View Activity Logs', 'slug' => 'logs.view', 'desc' => 'Can inspect system action audit trail'],
                ['name' => 'Clear Activity Logs', 'slug' => 'logs.clear', 'desc' => 'Can clear or prune legacy logs'],
            ],
            'System Operations' => [
                ['name' => 'Clear Cache', 'slug' => 'system.cache_clear', 'desc' => 'Can trigger route, view, and config cache clear'],
                ['name' => 'System Settings', 'slug' => 'system.settings', 'desc' => 'Can manage portal application settings'],
            ],
        ];

        $allPermissionIds = [];

        foreach ($modules as $moduleName => $permissions) {
            foreach ($permissions as $p) {
                $perm = Permission::updateOrCreate(
                    ['slug' => $p['slug']],
                    [
                        'module'      => $moduleName,
                        'name'        => $p['name'],
                        'description' => $p['desc'],
                    ]
                );
                $allPermissionIds[] = $perm->id;
            }
        }

        // 2. Define Roles
        $superAdminRole = Role::updateOrCreate(
            ['slug' => 'super-admin'],
            [
                'name'        => 'Super Administrator',
                'description' => 'Unrestricted master control across all modules and audit systems',
                'is_system'   => true,
                'priority'    => 1,
            ]
        );
        $superAdminRole->permissions()->sync($allPermissionIds);

        $academicAdminRole = Role::updateOrCreate(
            ['slug' => 'academic-admin'],
            [
                'name'        => 'Academic Administrator',
                'description' => 'Manages users, faculty, workshops, and general operations',
                'is_system'   => false,
                'priority'    => 2,
            ]
        );
        // Academic admin permissions
        $academicPermSlugs = ['users.view', 'users.create', 'users.edit', 'roles.view', 'logs.view', 'system.cache_clear'];
        $academicPermIds = Permission::whereIn('slug', $academicPermSlugs)->pluck('id')->toArray();
        $academicAdminRole->permissions()->sync($academicPermIds);

        $auditorRole = Role::updateOrCreate(
            ['slug' => 'auditor'],
            [
                'name'        => 'Compliance & Auditor',
                'description' => 'Read-only access to users, roles, and audit activity records',
                'is_system'   => false,
                'priority'    => 3,
            ]
        );
        $auditorPermSlugs = ['users.view', 'roles.view', 'permissions.view', 'logs.view'];
        $auditorPermIds = Permission::whereIn('slug', $auditorPermSlugs)->pluck('id')->toArray();
        $auditorRole->permissions()->sync($auditorPermIds);

        // 3. Create Default Super Admin Account
        $admin = User::updateOrCreate(
            ['email' => 'admin@icrw.net'],
            [
                'name'              => 'ICRW Super Admin',
                'password'          => Hash::make('Admin@12345'),
                'is_active'         => true,
                'email_verified_at' => now(),
            ]
        );
        $admin->roles()->sync([$superAdminRole->id]);

        // 4. Initial Audit Log
        ActivityLogger::log(
            'System',
            'INITIALIZE',
            'Database initialized with RBAC roles, permissions, and Super Admin account.',
            null,
            ['super_admin' => 'admin@icrw.net'],
            $admin->id
        );
    }
}
