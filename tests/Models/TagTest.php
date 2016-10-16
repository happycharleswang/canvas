<?php

use App\Models\Post;
use EGALL\EloquentPHPUnit\EloquentTestCase;

/**
 * Tag model test.
 *
 * Test the application's tag CRUD.
 */
class TagTest extends EloquentTestCase
{
    /**
     * The tag model's full namespace.
     *
     * @var string
     */
    protected $model = 'App\Models\Tag';

    /**
     * The user model.
     *
     * @var App\Models\User
     */
    private $user;

    /**
     * Test the database table.
     *
     * @return void
     */
    public function testDatabaseTable()
    {
        $this->table->column('id')->integer()->increments();
        $this->table->column('tag')->string()->unique();
        $this->table->column('title')->string()->notNullable();
        $this->table->column('subtitle')->string()->notNullable();
        $this->table->column('meta_description')->string();
        $this->table->column('layout')->string()->defaults(config('blog.tag_layout'));
        $this->table->column('reverse_direction')->boolean();
        $this->table->hasTimestamps();
    }

    /**
     * Test the tag model's properties.
     *
     * @return void
     */
    public function testModelProperties()
    {
        $this->belongsToMany(Post::class)
             ->hasCasts(['reverse_direction' => 'boolean'])
             ->hasFillable('tag', 'title', 'subtitle', 'meta_description', 'reverse_direction', 'created_at', 'updated_at');
    }

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
     * Test creating a tag.
     *
     * @return void
     */
    public function testItCreatesTag()
    {
        $this->actingAs($this->user)->post('admin/tag', [
            'tag'               => 'example',
            'title'             => 'foo',
            'subtitle'          => 'bar',
            'meta_description'  => 'FooBar',
            'layout'            => config('blog.tag_layout'),
            'reverse_direction' => 0,
        ]);

        $this->seeInDatabase('tags', [
            'tag'               => 'example',
            'title'             => 'foo',
            'subtitle'          => 'bar',
            'meta_description'  => 'FooBar',
            'layout'            => config('blog.tag_layout'),
            'reverse_direction' => 0,
        ]);

        $this->assertSessionHas('_new-tag', trans('messages.create_success', ['entity' => 'tag']));
        $this->assertRedirectedTo('admin/tag');
    }

    public function testItValidatesTagCreation()
    {
        $this->actingAs($this->user)->post('admin/tag', ['title' => 'example']);
        $this->assertSessionHasErrors();
    }

    public function testTagsCanBeEdited()
    {
        $this->actingAs($this->user)
            ->visit(route('admin.tag.edit', 1))
            ->type('Foo', 'title')
            ->press('Save')
            ->see('Success! Tag has been updated.')
            ->see('Foo')
            ->seeInDatabase('tags', ['title' => 'Foo']);
    }

    public function testTagsCanBeDeleted()
    {
        $this->actingAs($this->user)
            ->visit(route('admin.tag.edit', 1))
            ->press('Delete')
            ->dontSee('Success! Tag has been deleted.')
            ->press('Delete Tag')
            ->see('Success! Tag has been deleted.')
            ->dontSeeInDatabase('tags', ['id' => 1]);
    }
}
