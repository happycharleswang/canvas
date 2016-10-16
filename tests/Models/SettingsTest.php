<?php

use EGALL\EloquentPHPUnit\EloquentTestCase;

/**
 * Migrations model test.
 */
class SettingsTest extends EloquentTestCase
{
    /**
     * The user model's full namespace.
     *
     * @var string
     */
    protected $model = 'App\Models\Settings';

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
        $this->hasFillable(['setting_name', 'setting_value']);
    }
}
