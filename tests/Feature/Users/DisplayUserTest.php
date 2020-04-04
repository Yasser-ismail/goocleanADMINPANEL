<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DisplayUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_a_list_of_users()
    {
        $this->be(factory(User::class)->create(['type' => 'admin']));

        $response = $this->get(route('dashboard.users.index'));

        $response->assertSuccessful();

        $response->assertSee(trans('users.empty'));

        $user = factory(User::class)->create();

        $response = $this->get(route('dashboard.users.index'));

        $response->assertSuccessful();

        $response->assertSee($user->name);
    }

    /** @test */
    public function it_can_display_user_details()
    {
        $this->be(factory(User::class)->create(['type' => 'admin']));

        $user = factory(User::class)->create();

        $response = $this->get(route('dashboard.users.show', $user));

        $response->assertSuccessful();

        $response->assertSee($user->name);
    }
}
