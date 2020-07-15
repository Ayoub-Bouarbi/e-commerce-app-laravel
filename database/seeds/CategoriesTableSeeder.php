<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'          =>  'Root',
            'description'   =>  'This is the root category, don\'t delete this one',
            'parent_id'     =>  null,
            'menu'          =>  0,
        ]);

        Category::create([
            'name' => 'fresh Meat',
            'description' => 'this is the fresh meat category',
            'parent_id' => 1,
            'menu' => 1
        ]);
        Category::create([
            'name' => 'Vegetables',
            'description' => 'this is the vegetables category',
            'parent_id' => 1,
            'menu' => 1
        ]);
        Category::create([
            'name' => 'fresh berries',
            'description' => 'this is the fresh berries category',
            'parent_id' => 1,
            'menu' => 1
        ]);
        Category::create([
            'name' => 'ocean foods',
            'description' => 'this is the ocean foods category',
            'parent_id' => 1,
            'menu' => 1
        ]);
        Category::create([
            'name' => 'fastfood',
            'description' => 'this is the fastfood category',
            'parent_id' => 1,
            'menu' => 1
        ]);
    }
}
