<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('zh_TW');

        DB::table('posts')->truncate();

        /* Scenario #1.1 Payment
        -------------------------------------------------- */
        Post::create([
                'title'       => 'Scenario #1.1 Payment',
                'content'     => 'Alice AA payemnt',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 1,
                'payer_id' => 2,
                'comsumer_id' => 2,
                'cost' => 30,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        Post::create([
                'title'       => 'Scenario #1.1 Payment',
                'content'     => 'Bob AA payemnt',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 1,
                'payer_id' => 3,
                'comsumer_id' => 3,
                'cost' => 40,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        Post::create([
                'title'       => 'Scenario #1.1 Payment',
                'content'     => 'Charlie AA payemnt',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 1,
                'payer_id' => 1,
                'comsumer_id' => 1,
                'cost' => 50,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        /* Scenario #1.2 Payment
        -------------------------------------------------- */
        Post::create([
                'title'       => 'Scenario #1.2 Payment',
                'content'     => 'Charlie pay for himself',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 1,
                'payer_id' => 1,
                'comsumer_id' => 1,
                'cost' => 30,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        Post::create([
                'title'       => 'Scenario #1.2 Payment',
                'content'     => 'Charlie pay for Bob',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 1,
                'payer_id' => 1,
                'comsumer_id' => 2,
                'cost' => 40,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        Post::create([
                'title'       => 'Scenario #1.2 Payment',
                'content'     => 'Charlie pay for Alice',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 1,
                'payer_id' => 1,
                'comsumer_id' => 3,
                'cost' => 50,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);

        /* Scenario #1.? Payment
        -------------------------------------------------- */


	}

}