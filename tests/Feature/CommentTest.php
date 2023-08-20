<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Comment;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCreateComment(){
        $comment=new Comment();
        $comment->email="ramafajar805@gmail.com";
        $comment->title="Title Comment";
        $comment->comment="Mantap Cuy";

        $comment->save();
        self::assertNotNull($comment->id);
    }
}
