<?php

use EGALL\EloquentPHPUnit\EloquentTestCase;

/**
 * Migrations model test.
 */
class PasswordResetsTest extends EloquentTestCase
{
    /**
     * The user model's full namespace.
     *
     * @var string
     */
    protected $model = 'App\Models\PasswordResets';

    /**
     * Disable database seeding.
     *
     * @var bool
     */
    protected $seedDatabase = false;

    /**
     * Test the model's properties.
     *
     * @return void
     */
    public function testModelProperties()
    {
        $this->hasFillable(['email', 'token', 'created_at']);
    }
}
