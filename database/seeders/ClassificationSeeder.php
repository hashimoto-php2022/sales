<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['class_name' => '文学部系'],
            ['class_name' => '教育学部系'],
            ['class_name' => '法学部系'],
            ['class_name' => '社会学部系'],
            ['class_name' => '経済学部系'],
            ['class_name' => '理学部系'],
            ['class_name' => '医学部系'],
            ['class_name' => '歯学部系'],
            ['class_name' => '薬学部系'],
            ['class_name' => '工学部系'],
            ['class_name' => '農学部系'],
        ];
        \DB::table('classifications')->insert($data);
    }
}
