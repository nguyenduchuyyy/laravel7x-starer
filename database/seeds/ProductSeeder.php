<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// use Illuminate\Support\Int;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [];
        for ($i=0; $i < 5; $i++) { 
            $products[] = [
                'name' => 'Product '.$i,
                'price' => rand(7,8),
                'description' => 'Description '.$i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        DB::table('products')->insert($products);
    }
}
