<?php

namespace Database\Seeders;

use App\Models\Phone;
use App\Models\PhoneOffer;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resources = [
            [
                "brand" => "Samsung",
                "model" => "S9",
                "price" => "40000",
                "year" => "2010",
                "offers" => [
                    ["color" => "black", "memory" => 32],
                    ["color" => "black", "memory" => 64],
                    ["color" => "yellow", "memory" => 32],
                ],
            ],
            [
                "brand" => "Samsung",
                "model" => "S9+",
                "price" => "45000",
                "year" => "2011",
                "offers" => [
                    ["color" => "black", "memory" => 16],
                    ["color" => "black", "memory" => 64],
                    ["color" => "pink", "memory" => 32],
                    ["color" => "red", "memory" => 64],
                ],
            ],
            [
                "brand" => "Samsung",
                "model" => "S10",
                "price" => "47000",
                "year" => "2011",
                "offers" => [
                    ["color" => "black", "memory" => 32],
                    ["color" => "black", "memory" => 64],
                    ["color" => "black", "memory" => 128],
                    ["color" => "red", "memory" => 32],
                    ["color" => "red", "memory" => 64],
                ],
            ],
        ];

        foreach ($resources as $resource) {
            $phone = new Phone();
            foreach ($resource as $key => $value) {
                if ($key !== 'offers') {
                    $phone->{$key} = $value;
                } else {
                    $phone->save();
                    foreach ($value as $off) {
                        $offer = new PhoneOffer();
                        $offer->color = $off['color'];
                        $offer->memory = $off['memory'];
                        $phone->offers()->save($offer);
                    }
                }
            }
        }
    }
}
