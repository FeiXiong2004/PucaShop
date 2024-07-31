<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('posts')->insert(
                [
                    'title' => $faker->text(30),
                    'image' => 'https://i1-vnexpress.vnecdn.net/2024/06/29/3-1719619734-1719621296.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=rAlxZKqS0elOkHYCS8Jtpg',
                    'description' => $faker->text(50),
                    'content' => $faker->text(),
                    'view' => rand(1, 1000),
                    'cate_id' => rand(1, 4),
                ]
            );
        }
    }
}
