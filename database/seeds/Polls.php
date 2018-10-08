<?php

use Illuminate\Database\Seeder;

class Polls extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create();
        factory(App\Poll::class, 10)->create();
        factory(App\Question::class, 50)->create();
        factory(App\Answer::class, 500)->create();
    }
}
