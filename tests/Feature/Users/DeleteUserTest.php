<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_delete_the_user()
    {
        $this->be($user = factory(User::class)->create(['type' => 'admin']));

        $users = factory(User::class)->create();

        $usersCount = User::count();

        $response = $this->delete(route('dashboard.users.destroy', $users));

        $response->assertRedirect();

        $this->assertEquals(User::count(), $usersCount - 1);
    }
}
