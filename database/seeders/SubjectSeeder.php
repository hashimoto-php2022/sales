<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use Faker\Generator as Faker;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app()->make(Faker::class);
        for($i = 1; $i <= 15; $i++) {
            $max = pow(10, 13) - 1;
            $rand = rand(0, $max);
            $code = sprintf('%0'.'13'.'d', $rand);
            $subject = new Subject([
                'isbn_code' => $code,
                'title' => 'サンプル教科書'.$i,
                'class_id' => rand(1,11),
                'author' => $faker->name
            ]);
            $subject->save();
        }
    }
}
