<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createCommentsForProduct();
    }

    private function createCommentsForProduct():void{
        $product=Product::find("1");

        $comment=new Comment();
        $comment->email="ramafajar805@gmail.com";
        $comment->title="Comment Title";
        $comment->commentable_id=$product->id;
        $comment->commentable_type="product";
    }

    private function createCommentsForVoucher():void{
        $product=Voucher::first();

        $comment=new Comment();
        $comment->email="ramafajar805@gmail.com";
        $comment->title="Comment Title";
        $comment->commentable_id=$product->id;
        $comment->commentable_type="voucher";
    }
}
