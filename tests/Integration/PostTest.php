<?php


namespace Tests\Integration;


use App\Post;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PostTest extends TestCase
{

    use DatabaseMigrations;


    public function testStoreShouldCreateAnEntityIntoTheDatabase()
    {

        $this->be(factory(User::class)->create());

        $post = factory(Post::class)->raw();

        $result = json_decode($this->post('api/posts', $post)->getContent());

        $this->assertDatabaseHas('posts',
            ['title'=>$result->data->title, 'content'=>$result->data->content]);
    }

}
