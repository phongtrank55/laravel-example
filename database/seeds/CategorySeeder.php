<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'HP', 'slug' => 'hp', 'description' => 'Mô tả HP'],
            ['name' => 'Asus', 'slug' => 'asus', 'description' => 'Mô tả ASUS'],            
        ];
        foreach($categories as $category){
            DB::table('categories')->insert([
                'name' => $category['name'],
                'description' => $category['description'],
                'slug' => $category['slug'],
                'created_at'  =>  date('Y-m-d H:i:s', strtotime('now')),
                'updated_at'  =>  date('Y-m-d H:i:s', strtotime('now')),
            ]);
        }
    }
}
