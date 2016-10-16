<?php

/**
 * Class PasswordTest.
 *
 * Test the application's ability to update and validate a password.
 */
class UpdatePasswordTest extends TestCase
{
    use InteractsWithDatabase;

    /**
     * The user model.
     *
     * @var App\Models\User
     */
    private $user;

    /**
     * Create the user model test subject.
     *
     * @before
     * @return void
     */
    public function createUser()
    {
        $this->user = factory(App\Models\User::class)->create([
            'email'     => 'foo@bar.com',
            'password'  => bcrypt('password'),
        ]);
    }

    public function testItUpdatesPassword()
    {
        $this->actingAs($this->user)->post('auth/password', [
            'password'                  => 'password',
            'new_password'              => 'newPass',
            'new_password_confirmation' => 'newPass',
        ]);

        $this->assertSessionMissing('errors');
        $this->assertTrue(Auth::validate([
            'email'    => $this->user->email,
            'password' => 'newPass',
        ]));
    }

    public function testItValidatesCurrentPassword()
    {
        $this->actingAs($this->user)->post('auth/password', [
            'password'                  => 'wrongPass',
            'new_password'              => 'newPass',
            'new_password_confirmation' => 'newPass',
        ]);

        $this->assertEquals(Session::get('errors')->first(), trans('auth.failed'));
    }
}
