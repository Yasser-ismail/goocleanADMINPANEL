<?php

namespace Tests\Feature\users;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_edit_form()
    {
        $this->be(factory(User::class)->create(['type' => 'admin']));

        $user = factory(User::class)->create();

        $response = $this->get(route('dashboard.users.edit', $user));

        $response->assertSuccessful();

        $response->assertViewIs('dashboard.users.edit');
    }

    /** @test */
    public function the_user_can_update_user()
    {
        $this->be(factory(User::class)->create(['type' => 'admin']));

        $user = factory(User::class)->create();

        $this->patch(route('dashboard.users.update', $user), [
            'name' => 'test edit',
            'is_active' => '1',
            'type' => 'admin',
            'password' => 'admin',
            'email' => 'admin@test.com',
            'phone_number' => '0122596998',
        ]);

        $this->assertEquals($user->refresh()->name, 'test edit');
    }
}
