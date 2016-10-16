<?php

use EGALL\EloquentPHPUnit\EloquentTestCase;

/**
 * PostTag model test.
 */
class PostTagTest extends EloquentTestCase
{
    /**
     * The user model's full namespace.
     *
     * @var string
     */
    protected $model = 'App\Models\PostTag';

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
        $this->hasFillable(['post_id', 'tag_id', 'created_at', 'updated_at']);
    }
}
