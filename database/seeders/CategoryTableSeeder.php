<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tech= new Category();
        $tech->name="tech";
        $tech->slug="tech";
        $tech->save();
        $pet= new Category();
        $pet->name="pet";
        $pet->slug="pet";
        $pet->save();
        $health= new Category();
        $health->name="health";
        $health->slug="health";
        $health->save();
        $electronics= new Category();
        $electronics->name="electronics";
        $electronics->slug="electronics";
        $electronics->save();
        $news= new Category();
        $news->name="news";
        $news->slug="news";
        $news->save();
        
    }
}
