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
        $comment->commentable_id="1";
        $comment->commentable_type="product";

        $comment->save();
        self::assertNotNull($comment->id);
    }

    public function testDefaultAttributeValues(){
        $comment=new Comment();
        $comment->email="fajar@gmail.com";
        $comment->commentable_id="1";
        $comment->commentable_type="product";

        $comment->save();
        self::assertNotNull($comment->id);
        self::assertNotNull($comment->title);
        self::assertNotNull($comment->comment);
    }
}
