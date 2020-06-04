<?php

use Illuminate\Database\Seeder;

class CategoriesTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = ['cat one', 'cat two', 'cat Three'];

        foreach ($categories as $category)
        {
            \App\Category::create([

                'ar' => ['name' => $category],
                'en' => ['name' => $category],
            ]);
        }
    }
}
