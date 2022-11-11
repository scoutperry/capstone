<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Models\Department; # Make our Department Model accessible
use Faker\Factory; # We’ll use this library to generate random/fake data

class DepartmentsTableSeeder extends Seeder
{
    private $faker;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # https://fakerphp.github.io
        $this->faker = Factory::create();

        # add departments
        $this->addDepartments();
    }

    private function addDepartments()
    {
        $development = new department();
        $development->created_at = $this->faker->dateTime();
        $development->updated_at = $development->created_at;
        $development->name = 'Development';
        $development->save();

        $finance = new department();
        $finance->created_at = $this->faker->dateTime();
        $finance->updated_at = $finance->created_at;
        $finance->name = 'Finance';
        $finance->save();

        $deai = new department();
        $deai->created_at = $this->faker->dateTime();
        $deai->updated_at = $deai->created_at;
        $deai->name = 'DEAI';
        $deai->save();

        $curatorial = new department();
        $curatorial->created_at = $this->faker->dateTime();
        $curatorial->updated_at = $curatorial->created_at;
        $curatorial->name = 'Curatorial';
        $curatorial->save();

        $facilites = new department();
        $facilites->created_at = $this->faker->dateTime();
        $facilites->updated_at = $facilites->created_at;
        $facilites->name = 'Facilites';
        $facilites->save();

        $education = new department();
        $education->created_at = $this->faker->dateTime();
        $education->updated_at = $education->created_at;
        $education->name = 'Education';
        $education->save();

        $collections = new department();
        $collections->created_at = $this->faker->dateTime();
        $collections->updated_at = $collections->created_at;
        $collections->name = 'Collections';
        $collections->save();
    }
}
