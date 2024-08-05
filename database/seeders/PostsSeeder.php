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
                    'image' => 'https://bietthunhaphodep.com/wp-content/uploads/2015/12/hinh-anh-thiet-ke-noi-that-dep-cho-can-nha-cua-ban.jpg',
                    'description' => $faker->text(50),
                    'content' => $faker->text(),
                    'view' => rand(1, 1000),
                    'cate_id' => rand(1, 4),
                ]
            );
        }
    }
}
