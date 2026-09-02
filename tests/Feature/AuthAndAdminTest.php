<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthAndAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_can_be_rendered(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Pawsy');
        $response->assertSee('Masuk');
        $response->assertSee('Daftar');
    }

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Masuk ke Akun');
    }

    public function test_login_screen_does_not_contain_demo_credentials(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertDontSee('Kredensial Demo Cepat');
        $response->assertDontSee('admin@pawsy.com');
        $response->assertDontSee('user@pawsy.com');
        $response->assertDontSee('fillCredentials');
        $response->assertDontSee('demo-creds');
        $response->assertDontSee('demo-pill');
    }

    public function test_register_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('Daftar Akun Baru');
    }

    public function test_user_can_register_with_default_user_role(): void
    {
        $response = $this->post('/register', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'terms' => 'on',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticated();

        $user = User::where('email', 'budi@example.com')->first();
        $this->assertNotNull($user);
        $this->assertEquals('user', $user->role);
        $this->assertEquals('Budi Santoso', $user->name);
    }

    public function test_user_can_login_with_valid_credentials(): void
    {
        $user = User::create([
            'name' => 'Siti Rahma',
            'email' => 'siti@example.com',
            'password' => Hash::make('secret123'),
            'role' => 'user',
        ]);

        $response = $this->post('/login', [
            'email' => 'siti@example.com',
            'password' => 'secret123',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_admin_redirected_to_dashboard_upon_login(): void
    {
        $admin = User::create([
            'name' => 'Admin Pawsy',
            'email' => 'admin@pawsy.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@pawsy.com',
            'password' => 'admin123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($admin);
    }

    public function test_regular_user_cannot_access_admin_dashboard(): void
    {
        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@pawsy.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);

        $response = $this->actingAs($user)->get('/admin/dashboard');
        $response->assertRedirect(route('home'));
        $response->assertSessionHas('error');
    }

    public function test_admin_can_access_admin_dashboard(): void
    {
        $admin = User::create([
            'name' => 'Admin Pawsy',
            'email' => 'admin@pawsy.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->get('/admin/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Kelola Data Pengguna');
    }

    public function test_admin_can_create_new_user(): void
    {
        $admin = User::create([
            'name' => 'Admin Pawsy',
            'email' => 'admin@pawsy.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->post('/admin/users', [
            'name' => 'New Customer',
            'email' => 'newcustomer@example.com',
            'password' => 'password123',
            'role' => 'user',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertDatabaseHas('users', [
            'email' => 'newcustomer@example.com',
            'role' => 'user',
        ]);
    }

    public function test_admin_can_update_user(): void
    {
        $admin = User::create([
            'name' => 'Admin Pawsy',
            'email' => 'admin@pawsy.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        $targetUser = User::create([
            'name' => 'Old Name',
            'email' => 'old@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        $response = $this->actingAs($admin)->put("/admin/users/{$targetUser->id}", [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'role' => 'admin',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertDatabaseHas('users', [
            'id' => $targetUser->id,
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'role' => 'admin',
        ]);
    }

    public function test_admin_can_delete_another_user(): void
    {
        $admin = User::create([
            'name' => 'Admin Pawsy',
            'email' => 'admin@pawsy.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        $targetUser = User::create([
            'name' => 'To Delete',
            'email' => 'todelete@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        $response = $this->actingAs($admin)->delete("/admin/users/{$targetUser->id}");
        $response->assertRedirect(route('admin.dashboard'));
        $this->assertDatabaseMissing('users', [
            'id' => $targetUser->id,
        ]);
    }

    public function test_admin_cannot_delete_own_account(): void
    {
        $admin = User::create([
            'name' => 'Admin Pawsy',
            'email' => 'admin@pawsy.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->delete("/admin/users/{$admin->id}");
        $response->assertSessionHas('error');
        $this->assertDatabaseHas('users', [
            'id' => $admin->id,
        ]);
    }

    public function test_user_can_logout(): void
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testlogout@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        $response = $this->actingAs($user)->post('/logout');
        $response->assertRedirect(route('home'));
        $this->assertGuest();
    }

    public function test_login_fails_with_invalid_password(): void
    {
        User::create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => Hash::make('correctpassword'),
            'role' => 'user',
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => 'user@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_login_requires_email_and_password(): void
    {
        $response = $this->from('/login')->post('/login', [
            'email' => '',
            'password' => '',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors(['email', 'password']);
        $this->assertGuest();
    }

    public function test_authenticated_admin_visiting_login_is_redirected_to_dashboard(): void
    {
        $admin = User::create([
            'name' => 'Admin Pawsy',
            'email' => 'admin@pawsy.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->get('/login');
        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_authenticated_user_visiting_login_is_redirected_to_home(): void
    {
        $user = User::create([
            'name' => 'Jessica Putri',
            'email' => 'user@pawsy.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);

        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect(route('home'));
    }

    public function test_admin_cannot_demote_own_role(): void
    {
        $admin = User::create([
            'name' => 'Admin Pawsy',
            'email' => 'admin@pawsy.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->put("/admin/users/{$admin->id}", [
            'name' => 'Admin Pawsy Renamed',
            'email' => 'admin@pawsy.com',
            'role' => 'user',
        ]);

        $response->assertSessionHas('error');
        $this->assertEquals('admin', $admin->fresh()->role);
    }

    public function test_landing_page_renders_auth_required_modal_and_guest_auth_state_for_unauthenticated_users(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('authRequiredModal');
        $response->assertSee('Yuk Masuk ke Akun Dulu!');
        $response->assertSee('isLoggedIn: false', false);
        $response->assertSee('Kamu belum masuk. Silakan');
    }

    public function test_landing_page_renders_authenticated_auth_state_for_logged_in_users(): void
    {
        $user = User::create([
            'name' => 'Jessica Putri',
            'email' => 'jessica@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
        $response->assertSee('isLoggedIn: true', false);
        $response->assertSee('Jessica Putri');
        $response->assertDontSee('Kamu belum masuk. Silakan');
    }
}
