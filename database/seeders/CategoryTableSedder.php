<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSedder extends Seeder
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
        $animal= new Category();
        $animal->name="animal";
        $animal->slug="animal";
        $animal->save();
        $health= new Category();
        $health->name="health";
        $health->slug="health";
        $health->save();
        
    }
}
