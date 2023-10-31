<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Person;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PersonTest extends TestCase
{
    public function testPerson(){
        $person=new Person();
        $person->first_name="Rama";
        $person->last_name="Fajar";
        $person->save();
        self::assertEquals("Rama Fajar", $person->full_name);
        
        $person->full_name="Fajar Fadhillah";
        $person->save();
        self::assertEquals("Fajar", $person->first_name);
        self::assertEquals("Fadhillah", $person->last_name);

    }

    public function testPersonFirstName(){
        $person=new Person();
        $person->first_name="Rama";
        $person->last_name="Fajar";
        $person->save();
        self::assertEquals("RAMA Fajar", $person->full_name);
        
        $person->full_name="Fajar Fadhillah";
        $person->save();
        self::assertEquals("FAJAR", $person->first_name);
        self::assertEquals("Fadhillah", $person->last_name);
    }

    public function testAttributeCasting(){
        $person=new Person();
        $person->first_name="Rama";
        $person->last_name="Fajar";
        $person->save();

        self::assertNotNull($person->created_at);
        self::assertNotNull($person->updated_at);
        self::assertInstanceOf(Carbon::class, $person->created_at);
        self::assertInstanceOf(Carbon::class, $person->updated_at);
    }
}
