<?php


namespace Tests\Feature;


use App\Post;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PostTest extends TestCase
{

    use DatabaseMigrations;

    // test if the title is missing
    // test if the content is missing
    // test if the title length is less than the expectation
    // test if the content length is less than the expectation
    // test if the post has not been created before

    // test if the store return successful results


    public function testStoreShouldThrowAnErrorIfTitleIsMissing()
    {

        $this->post('api/posts')
            ->assertStatus(self::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonStructure(['errors'=>['title']]);
    }

    public function testStoreShouldThrowAnErrorIfContentIsMissing()
    {

        $this->post('api/posts')
            ->assertStatus(self::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonStructure(['errors'=>['content']]);
    }

    public function testStoreShouldThrowAnErrorIfContentLengthIsLessThanTheExpectation()
    {

        $this->post('api/posts', ['content'=>'abc'])
            ->assertStatus(self::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonStructure(['errors'=>['content']]);
    }

    public function testStoreShouldThrowAnErrorIfTitleLengthIsLessThanTheExpectation()
    {

        $this->post('api/posts', ['title'=>'abc'])
            ->assertStatus(self::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonStructure(['errors'=>['title']]);
    }

    public function testStoreShouldThrowAnErrorIfPostHasBeenCreated()
    {

        $postTile = factory(Post::class)->create()->title;

        $this->post('api/posts', ['title'=>$postTile])
            ->assertStatus(self::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonStructure(['errors'=>['title']]);
    }


    public function testStoreShouldReturnSuccessIfAllGoesWell()
    {

        $this->be(factory(User::class)->create());

        $post = factory(Post::class)->raw();

        $this->post('api/posts', $post)
            ->assertStatus(self::HTTP_CREATED)
            ->assertJson(['data'=>['title'=>$post['title']]]);
    }

}
