<?php

namespace App\Models;

class Address{
    public string $street,
                  $city,
                  $country,
                  $postalCode;

   public function __construct(string $street, string $city, string $country, string $postalCode){
            $this->street=$street;
            $this->city=$city;
            $this->country=$country;
            $this->postalCode=$postalCode;
   }
}