<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\ActivityLog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\AdminRbacSeeder;

class AdminPortalTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(AdminRbacSeeder::class);
    }

    public function test_admin_login_screen_renders_successfully(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
        $response->assertSee('Executive Portal');
        $response->assertSee('Administrative Email');
    }

    public function test_unauthenticated_user_cannot_access_admin_dashboard(): void
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/admin/login');
    }

    public function test_super_admin_can_login_and_access_dashboard(): void
    {
        $admin = User::where('email', 'admin@icrw.net')->first();
        $this->assertNotNull($admin);

        $loginResponse = $this->post('/admin/login', [
            'email'    => 'admin@icrw.net',
            'password' => 'Admin@12345',
        ]);

        $loginResponse->assertRedirect('/admin/dashboard');

        $this->assertAuthenticatedAs($admin);

        $dashboardResponse = $this->actingAs($admin)->get('/admin/dashboard');
        $dashboardResponse->assertStatus(200);
        $dashboardResponse->assertSee('ICRW Executive Governance');
    }

    public function test_super_admin_can_access_users_management(): void
    {
        $admin = User::where('email', 'admin@icrw.net')->first();

        $response = $this->actingAs($admin)->get('/admin/users');
        $response->assertStatus(200);
        $response->assertSee('Administrative Users');
    }

    public function test_super_admin_can_access_roles_management(): void
    {
        $admin = User::where('email', 'admin@icrw.net')->first();

        $response = $this->actingAs($admin)->get('/admin/roles');
        $response->assertStatus(200);
        $response->assertSee('Roles Management');
        $response->assertSee('Super Administrator');
    }

    public function test_super_admin_can_access_permissions_management(): void
    {
        $admin = User::where('email', 'admin@icrw.net')->first();

        $response = $this->actingAs($admin)->get('/admin/permissions');
        $response->assertStatus(200);
        $response->assertSee('Permissions Management');

        // Verify DataTables AJAX endpoint
        $ajaxResponse = $this->actingAs($admin)->getJson('/admin/permissions');
        $ajaxResponse->assertStatus(200);
        $ajaxResponse->assertJsonStructure(['data', 'recordsTotal']);
    }

    public function test_super_admin_can_access_activity_logs(): void
    {
        $admin = User::where('email', 'admin@icrw.net')->first();

        $response = $this->actingAs($admin)->get('/admin/logs');
        $response->assertStatus(200);
        $response->assertSee('Audit Trail & Activity Logs');
    }

    public function test_cache_clear_endpoint_returns_json_success(): void
    {
        $admin = User::where('email', 'admin@icrw.net')->first();

        $response = $this->actingAs($admin)->postJson('/admin/cache-clear');
        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }
}
