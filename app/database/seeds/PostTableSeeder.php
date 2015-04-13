<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('zh_TW');

        DB::table('posts')->truncate();

        /* Scenario #1 Payment
        -------------------------------------------------- */
        Post::create([
                'content'     => 'Scenario #1 Payment - Charlie pay for self',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 1,
                'payer_id' => 1,
                'consumer_id' => 1,
                'cost' => 50,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        Post::create([
                'content'     => 'Scenario #1 Payment - Charlie pay for Alice',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 1,
                'payer_id' => 1,
                'consumer_id' => 2,
                'cost' => 30,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        Post::create([
                'content'     => 'Scenario #1 Payment - Charlie pay for Bob',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 1,
                'payer_id' => 1,
                'consumer_id' => 3,
                'cost' => 40,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        /* Scenario #3.2 Payment
        -------------------------------------------------- */
        Post::create([
                'content'     => 'Scenario #1 Payment - Charlie pay for self',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 2,
                'payer_id' => 1,
                'consumer_id' => 1,
                'cost' => 30,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        Post::create([
                'content'     => 'Scenario #3.2 Payment - Alice pay for self',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 2,
                'payer_id' => 2,
                'consumer_id' => 2,
                'cost' => 10,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        Post::create([
                'content'     => 'Scenario #3.2 Payment - Bob pay for self',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 2,
                'payer_id' => 3,
                'consumer_id' => 3,
                'cost' => 20,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);

        /* Scenario #3.23 Payment
        -------------------------------------------------- */
        Post::create([
                'content'     => 'Scenario #1 Payment - Charlie pay for self',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 3,
                'payer_id' => 1,
                'consumer_id' => 1,
                'cost' => 40,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        Post::create([
                'content'     => 'Scenario #3.2 Payment - Alice pay for self',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 3,
                'payer_id' => 2,
                'consumer_id' => 2,
                'cost' => 20,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        Post::create([
                'content'     => 'Scenario #3.2 Payment - Bob pay for self',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 3,
                'payer_id' => 3,
                'consumer_id' => 3,
                'cost' => 30,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);

	}

}