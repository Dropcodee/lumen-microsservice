<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Author::create([
            "name" => "Mr Jelili",
            "gender" => "male",
            "country" => "Nigeria",
        ]);

        Author::create([
            "name" => "Mr gbadebo",
            "gender" => "male",
            "country" => "Nigeria",
        ]);

        Author::create([
            "name" => "Jesicca bello",
            "gender" => "female",
            "country" => "US",
        ]);

        Author::create([
            "name" => "FEI WONG",
            "gender" => "female",
            "country" => "China",
        ]);
    }
}