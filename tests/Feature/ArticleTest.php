<?php

namespace Tests\Feature;

use App\Article;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function testIsLikedByNull()
    {
        $article = factory(Article::class)->create();
        $result = $article->isLikedBy(null);
        $this->assertFalse($result);
    }

    public function testIsLikedByTheUser()
    {
        $article = factory(Article::class)->create();
        $user = factory(User::class)->create();
        $article->likes()->attach($user);
        $result = $article->isLikedBy($user);
        $this->assertTrue($result);
    }
}
