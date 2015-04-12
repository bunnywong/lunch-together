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
                'content'     => 'Scenario #1.1 Payment - Alice AA payemnt',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 1,
                'payer_id' => 2,
                'consumer_id' => 2,
                'cost' => 30,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        Post::create([
                'content'     => 'Scenario #1.1 Payment - Bob AA payemnt',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 1,
                'payer_id' => 3,
                'consumer_id' => 3,
                'cost' => 40,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        Post::create([
                'content'     => 'Scenario #1.1 Payment - Charlie AA payemnt',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 1,
                'payer_id' => 1,
                'consumer_id' => 1,
                'cost' => 50,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        /* Scenario #1.2 Payment
        -------------------------------------------------- */
        Post::create([
                'content'     => 'Scenario #1.2 Payment - Charlie pay for himself',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 1,
                'payer_id' => 1,
                'consumer_id' => 1,
                'cost' => 30,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        Post::create([
                'content'     => 'Scenario #1.2 Payment - Charlie pay for Bob',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 1,
                'payer_id' => 1,
                'consumer_id' => 2,
                'cost' => 40,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        Post::create([
                'content'     => 'Scenario #1.2 Payment - Charlie pay for Alice',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 1,
                'payer_id' => 1,
                'consumer_id' => 3,
                'cost' => 50,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);

        /* Scenario #1.3 Payment
        -------------------------------------------------- */
        Post::create([
                'content'     => 'Scenario #1.3 Payment - David pay for Charlie',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 2,
                'payer_id' => 4,
                'consumer_id' => 1,
                'cost' => 50,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        Post::create([
                'content'     => 'Scenario #1.3 Payment - Charlie pay for Alice',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 2,
                'payer_id' => 1,
                'consumer_id' => 2,
                'cost' => 60,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
        Post::create([
                'content'     => 'Scenario #1.3 Payment - Charlie pay for Bob',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 2,
                'payer_id' => 1,
                'consumer_id' => 2,
                'cost' => 80,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);
       /* Post::create([
                'content'     => 'fake',
                'event_date' => \Carbon\Carbon::now()->addDays(0),
                'category_id' => 2,
                'payer_id' => 2,
                'consumer_id' => 1,
                'cost' => 80,
                'created_at'  => \Carbon\Carbon::now()->addDays(-1),
                'updated_at'  => \Carbon\Carbon::now()->addDays(0),
            ]);*/
	}

}