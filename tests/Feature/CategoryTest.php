<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    public function testInsert(){
        $category=new Category();
        $category->id="GADGET";
        $category->name="Gadget";
        $category->description="Gadget Description";
        $result=$category->save();

        self::assertTrue($result);
    }
}
