<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ["name"=> "Nội thất phòng khách",
            "image" =>"https://anphonghouse.com/wp-content/uploads/2018/06/hinh-nen-noi-that-dep-full-hd-so-43-0.jpg"
            ],
            ["name"=> "Nội thất phòng ngủ",
            "image" =>"https://media.noithatcaco.vn/upanh/uploads/04-2023/v6zgef.jpg"
            ],
            ["name"=> "Nội thất phòng bếp",
            "image" =>"https://donggia.vn/wp-content/uploads/2020/04/thiet-ke-noi-that-phong-bep-an-dep-2020-16.jpg"
            ],
            ["name"=> "Nội thất phòng làm việc",
            "image" =>"https://ardeco.vn/hm_contents/uploads/mau-thiet-ke-noi-that-phong-giam-doc-cao-cap-sang-trong_18.jpg"
            ],
            ["name"=> "Nội thất phòng trẻ em",
                "image" =>"https://dogolegia.vn/wp-content/uploads/2022/09/Bo-giuong-tu-tre-em-dep-hien-dai-LG-PTE213-1.jpg"
            ],
        ]);
    }
}
