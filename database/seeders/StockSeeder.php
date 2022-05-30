<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stock;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = ['未使用', '新品', '中古'];
        for($i = 1; $i <= 15; $i++) {
            $stock = new Stock([
                'user_id' => rand(1, 3),
                'subject_id' => rand(1, 6),
                'status' => $status[rand(0, 2)],
                'price' => rand(1, 10) * 100,
                'stock' => rand(0, 1),
            ]);
            $stock->save();
        }
    }
}
