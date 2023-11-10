<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Employee;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    
     public function testFactory(){
        $employee1=Employee::factory()->programmer()->make();
        $employee1->id="1";     
        $employee1->name="Employee 1";     
        $employee1->save();    

        self::assertNotNull(Employee::where("id","1")->first());
    }
}
