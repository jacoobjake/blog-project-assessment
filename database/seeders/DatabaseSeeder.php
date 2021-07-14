<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();
        $user2 = User::factory()->create();

        $familyCat = Category::create([
            'category_name' => 'Family', 
            'category_code' => 'F'
        ]);
        $workCat = Category::create([
            'category_name' => 'Work',
            'category_code' => 'W'
        ]);
        $hobbyCat = Category::create([
            'category_name' => 'Hobby',
            'category_code' => 'H'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $familyCat->id,
            'excerpt' => 'SOme excerpt',
            'title' => 'Some title',
            'published_datetime' => now(),
            'body' => 'tuioinsad wqyeqwedo ndasdasiyddfe oqwmnasyhdqiw qwosdsad;cmdcn'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $hobbyCat->id,
            'excerpt' => 'SOme excerpt 2',
            'title' => 'Some title 2',
            'published_datetime' => now(),
            'body' => '222 tuioinsad wqyeqwedo ndasdasiyddfe oqwmnasyhdqiw qwosdsad;cmdcn'
        ]);

        Post::create([
            'user_id' => $user2->id,
            'category_id' => $workCat->id,
            'excerpt' => 'SOme excerpt 3',
            'title' => 'Some title 3',
            'published_datetime' => now(),
            'body' => '3333 tuioinsad wqyeqwedo ndasdasiyddfe oqwmnasyhdqiw qwosdsad;cmdcn'
        ]);

        Post::create([
            'user_id' => $user2->id,
            'category_id' => $familyCat->id,
            'excerpt' => 'SOme excerpt 4',
            'title' => 'Some title 4',
            'published_datetime' => now(),
            'body' => '4444 tuioinsad wqyeqwedo ndasdasiyddfe oqwmnasyhdqiw qwosdsad;cmdcn'
        ]);
    }
}
