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
        //---ダミーデータを3個作る-----------------
        $faker = app()->make(Faker::class);
        for($i = 1; $i <= 3; $i++) {
            $max = pow(10, 13) - 1;
            $rand = rand(0, $max);
            $code = sprintf('%0'.'13'.'d', $rand);
            $subject = new Subject([
                'isbn_code' => $code,
                'title' => 'サンプル教科書'.$i,
                'class_id' => rand(1,11),
                'author' => $faker->name,
            ]);
            $subject->save();
        }
        //----------------------------------------
        $data = [
            [
                'isbn_code' => 9784010339466,
                'title' => 'スクランブル英文法・語法',
                'class_id' => 1,
                'author' => '中尾孝司',
                'image' => 'scramble.jpg'
            ],
            [
                'isbn_code' => 9784800257642,
                'title' => '眠れなくなる宇宙のはなし',
                'class_id' => 6,
                'author' => '佐藤勝彦',
                'image' => 'utyu.jpg'
            ],
            [
                'isbn_code' => 9784297117818,
                'title' => 'キタミ式イラストIT塾 基本情報技術者 令和03年',
                'class_id' => 10,
                'author' => 'きたみりゅうじ',
                'image' => 'kihon.jpg'
            ],
        ];
        \DB::table('subjects')->insert($data);
    }
}
