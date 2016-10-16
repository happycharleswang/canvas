<?php

/**
 * Class AdminRoutesTest.
 *
 * Test the response code for each administrative route after login.
 */
class AdminRoutesTest extends TestCase
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
        $this->user = factory(App\Models\User::class)->create();
    }

    /**
     * Test the response code for the Home page.
     *
     * @return void
     */
    public function testHomePageResponseCode()
    {
        $response = $this->actingAs($this->user)->call('GET', '/admin');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['data']);
    }

    /**
     * Test the response code for the Posts page.
     *
     * @return void
     */
    public function testPostsPageResponseCode()
    {
        $response = $this->actingAs($this->user)->call('GET', '/admin/post');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['data']);
    }

    /**
     * Test the response code for the Edit Posts page.
     *
     * @return void
     */
    public function testEditPostsPageResponseCode()
    {
        $response = $this->actingAs($this->user)->call('GET', '/admin/post/1/edit');
        $this->assertEquals(200, $response->status());
        $this->assertViewHas(['id', 'title', 'slug', 'subtitle', 'page_image', 'content', 'meta_description', 'is_draft', 'publish_date', 'publish_time', 'published_at', 'updated_at', 'layout', 'tags', 'allTags']);
    }

    /**
     * Test the response code for the Tags page.
     *
     * @return void
     */
    public function testTagsPageResponseCode()
    {
        $response = $this->actingAs($this->user)->call('GET', '/admin/tag');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['data']);
    }

    /**
     * Test the response code for the Edit Tags page.
     *
     * @return void
     */
    public function testEditTagsPageResponseCode()
    {
        $response = $this->actingAs($this->user)->call('GET', '/admin/tag/1/edit');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['data']);
    }

    /**
     * Test the response code for the Media Library page.
     *
     * @return void
     */
    public function testMediaLibraryPageResponseCode()
    {
        $response = $this->actingAs($this->user)->call('GET', '/admin/upload');
        $this->assertEquals(200, $response->status());
    }

    /**
     * Test the response code for the Profile page.
     *
     * @return void
     */
    public function testProfilePageResponseCode()
    {
        $response = $this->actingAs($this->user)->call('GET', '/admin/profile');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['data']);
    }

    /**
     * Test the response code for the Profile Settings page.
     *
     * @return void
     */
    public function testProfileSettingsPageResponseCode()
    {
        $response = $this->actingAs($this->user)->call('GET', '/admin/profile/'.$this->user['id'].'/edit');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['data']);
    }

    /**
     * Test the response code for the Profile Privacy page.
     *
     * @return void
     */
    public function testProfilePrivacyPageResponseCode()
    {
        $response = $this->actingAs($this->user)->call('GET', '/admin/profile/privacy');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['data']);
    }

    /**
     * Test the response code for the Tools page.
     *
     * @return void
     */
    public function testToolsPageResponseCode()
    {
        $response = $this->actingAs($this->user)->call('GET', '/admin/tools');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['data']);
    }

    /**
     * Test the response code for the Settings page.
     *
     * @return void
     */
    public function testSettingsPageResponseCode()
    {
        $response = $this->actingAs($this->user)->call('GET', '/admin/settings');
        $this->assertEquals(200, $response->status());
        $this->assertViewHasAll(['data']);
    }

    /**
     * Test the response code for the Help page.
     *
     * @return void
     */
    public function testHelpPageResponseCode()
    {
        $response = $this->actingAs($this->user)->call('GET', '/admin/help');
        $this->assertEquals(200, $response->status());
    }
}
