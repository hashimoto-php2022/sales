<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subject;
use Faker\Generator as Faker;

class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // for($i = 1; $i <= 15; $i++) {
        //     $max = pow(10, 13) - 1;
        //     $rand = rand(0, $max);
        //     $code = sprintf('%0'.'13'.'d', $rand);
        //     $subject = new Subject([
        //         'isbn_code' => $code,
        //         'title' => 'サンプル教科書'.$i,
        //         'class_id' => rand(1,11),
        //         Subject::factory()->count(1)->create()
        //     ]);
        //     $subject->save();
        // }
        return [
            $faker->name
        ];
    }
}
