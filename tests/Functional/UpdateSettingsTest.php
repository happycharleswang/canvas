<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class UpdateSettingsTest extends TestCase
{
    use DatabaseMigrations;

    protected $optionalFields = [
        'blog_description' => '<dt>Description</dt>',
        'blog_seo' => '<dt>Blog SEO</dt>',
        'blog_author' => '<dt>Blog Author</dt>',
        'disqus_name' => '<dt>Disqus</dt>',
        'ga_id' => '<dt>Google Analytics</dt>',
    ];

    protected $requiredFields = [
        'blog_title',
        'blog_subtitle',
    ];

    public function testItShowsErrorMessagesForRequiredFields()
    {
        $this->actingAs(factory(App\Models\User::class)->create())
            ->visit('/admin/settings');

        // fill in all require fields with an empty string
        foreach ($this->requiredFields as $name) {
            $this->type('', $name);
        }

        $this->press('Save');

        // assert response contains error message for each field
        foreach ($this->requiredFields as $name) {
            $this->see('The '.str_replace('_', ' ', $name).' field is required.');
        }
    }

    public function testItSuccessfullyUpdatesSettings()
    {
        $this->actingAs(factory(App\Models\User::class)->create())
            ->visit('/admin/settings');

        $this->type('New and Updated Title', 'blog_title')->press('Save');
        $this->assertSessionMissing('errors');
        $this->seePageIs('admin/settings');
    }
}
