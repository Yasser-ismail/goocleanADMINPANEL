<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_create_form()
    {
        $this->be(factory(User::class)->create(['type' => 'admin']));

        $response = $this->get(route('dashboard.users.create'));

        $response->assertSuccessful();

        $response->assertViewIs('dashboard.users.create');
    }

    /** @test */
    public function the_name_field_is_required()
    {
        $this->be(factory(User::class)->create(['type' => 'admin']));

        $response = $this->postJson(route('dashboard.users.store'));

        $response->assertJsonValidationErrors(['name']);
    }

    /** @test */
    public function the_is_active_field_is_required()
    {
        $this->be(factory(User::class)->create(['type' => 'admin']));

        $response = $this->postJson(route('dashboard.users.store'));

        $response->assertJsonValidationErrors(['is_active']);
    }


    /** @test */
    public function the_type_field_is_required()
    {
        $this->be(factory(User::class)->create(['type' => 'admin']));

        $response = $this->postJson(route('dashboard.users.store'));

        $response->assertJsonValidationErrors(['type']);
    }

    /** @test */
    public function the_password_field_is_required()
    {
        $this->be(factory(User::class)->create(['type' => 'admin']));

        $response = $this->postJson(route('dashboard.users.store'));

        $response->assertJsonValidationErrors(['password']);
    }

    /** @test */
    public function the_email_field_is_required()
    {
        $this->be(factory(User::class)->create(['type' => 'admin']));

        $response = $this->postJson(route('dashboard.users.store'));

        $response->assertJsonValidationErrors(['email']);
    }

    /** @test */
    public function the_phone_number_field_is_required()
    {
        $this->be(factory(User::class)->create(['type' => 'admin']));

        $response = $this->postJson(route('dashboard.users.store'));

        $response->assertJsonValidationErrors(['phone_number']);
    }

    /** @test */
    public function the_authenticated_user_can_create_user()
    {
        $this->be(factory(User::class)->create(['type' => 'admin']));

        $usersCount = User::count();

        $city = factory(City::class)->create();

        $response = $this->post(route('dashboard.users.store'), [
            'name' => 'test',
            'is_active' => '1',
            'type' => 'admin',
            'password' => 'admin',
            'email' => 'admin@test.com',
            'phone_number' => '0122596998',
        ]);

        $response->assertRedirect();

        $this->assertEquals(User::count(), $usersCount + 1);
        $this->assertEquals(User::get()->last()->name, 'test');
    }
}
