<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => '1',
                'subject_id' => '1',
                'status' => '未使用',
                'price' => '3000',
                'stock' => '1',
            ],
            [
                'user_id' => '1',
                'subject_id' => '2',
                'status' => '新品',
                'price' => '2500',
                'stock' => '1',
            ],
            [
                'user_id' => '3',
                'subject_id' => '2',
                'status' => '中古',
                'price' => '500',
                'stock' => '0',
            ],
        ];
        \DB::table('stocks')->insert($data);
    }
}
