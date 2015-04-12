<?php

class CategoryTableSeeder extends Seeder {

	public function run()
	{
        DB::table('categories')->truncate();

        $names = ['Restaurant X', 'Restaurant A', 'Restaurant B'];

        foreach($names as $index => $name)
        {
            Category::create([
                'name'        => $name,
                'created_at'  => \Carbon\Carbon::now()->addDays($index),
                'updated_at'  => \Carbon\Carbon::now()->addDays($index),
            ]);
        }
	}

}