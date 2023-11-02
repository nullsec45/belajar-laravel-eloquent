<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Person;
use App\Models\Address;
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

    public function testCustomCasts(){
        $person=new Person();
        $person->first_name="Rama";
        $person->last_name="Fajar";
        $person->address=new Address("Jalan Permata 1","Jakarta","Indonesia","13320");
        $person->save();

        $person=Person::query()->find($person->id);
        self::assertNotNull($person->address);
        self::assertInstanceOf(Address::class, $person->address);
        self::assertEquals("Jalan Permata 1", $person->address->street);
        self::assertEquals("Jakarta", $person->address->city);
        self::assertEquals("Indonesia", $person->address->country);
        self::assertEquals("13320", $person->address->postalCode);
    }
}
