<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                "name" => "GHẾ SOFA UNI 8424",
                "price" => "40",
                "image" => "https://product.hstatic.net/1000256920/product/upload_2a07cad3820542f7be95b26b1dc29cd7_master.jpg",
                "quantity" => "5",
                "description" => "Sofa giường hiện nay đang trở thành một trong những vật dụng phổ biến trong ngôi nhà của nhiều gia đình. Bởi lẽ, sofa giường có rất nhiều tính năng nổi bật, bên cạnh sử dụng làm ghế để tiếp khách, tụ tập bạn bè, đây còn là một chiếc giường dùng để nghỉ ngơi đem tới cho bạn sự thoải mái mỗi khi sử dụng.",
                "category_id" => 1,
            ],
            [
                "name" => "SOFA 2 CHỖ UNI 5424324323",
                "price" => "50",
                "image" => "https://product.hstatic.net/1000256920/product/upload_e0ebbdbc104142f2b07c475f185b1926_master.jpg",
                "quantity" => "6",
                "description" => "Sofa giường hiện nay đang trở thành một trong những vật dụng phổ biến trong ngôi nhà của nhiều gia đình. Bởi lẽ, sofa giường có rất nhiều tính năng nổi bật, bên cạnh sử dụng làm ghế để tiếp khách, tụ tập bạn bè, đây còn là một chiếc giường dùng để nghỉ ngơi đem tới cho bạn sự thoải mái mỗi khi sử dụng.",
                "category_id" => 1,
            ],
            [
                "name" => "ĐÈN NGỦ CÂY HAI BÓNG",
                "price" => "60",
                "image" => "https://product.hstatic.net/1000256920/product/upload_433f637499ec4bba83583f0a7e85cada_master.jpg",
                "quantity" => "6",
                "description" => "Phasellus vel elit non dui eleifend euismod eget eget mi. Mauris posuere, mi sit amet imperdiet feugiat.",
                "category_id" => 2,
            ],
            [
                "name" => "BÀN LÀM VIỆC THÔNG MINH",
                "price" => "60",
                "image" => "https://product.hstatic.net/1000256920/product/upload_1e376cef4a4849a885d609f3db5b1e84_master.jpg",
                "quantity" => "7",
                "description" => "Phasellus vel elit non dui eleifend euismod eget eget mi. Mauris posuere, mi sit amet imperdiet feugiat.",
                "category_id" => 3,
            ],
            [
                "name" => "BÀN TRÒN MỘT CHÂN",
                "price" => "20",
                "image" => "https://product.hstatic.net/1000256920/product/upload_cefdd6fd9a4947cea7bfafa0f1a8c093_master.jpg",
                "quantity" => "3",
                "description" => "Phasellus vel elit non dui eleifend euismod eget eget mi. Mauris posuere, mi sit amet imperdiet feugiat.",
                "category_id" => 4,
            ],
            [
                "name" => "GHẾ SOFA UNI 8424",
                "price" => "40",
                "image" => "https://product.hstatic.net/1000256920/product/upload_2a07cad3820542f7be95b26b1dc29cd7_master.jpg",
                "quantity" => "5",
                "description" => "Sofa giường hiện nay đang trở thành một trong những vật dụng phổ biến trong ngôi nhà của nhiều gia đình. Bởi lẽ, sofa giường có rất nhiều tính năng nổi bật, bên cạnh sử dụng làm ghế để tiếp khách, tụ tập bạn bè, đây còn là một chiếc giường dùng để nghỉ ngơi đem tới cho bạn sự thoải mái mỗi khi sử dụng.",
                "category_id" => 1,
            ],
            [
                "name" => "SOFA 2 CHỖ UNI 5424324323",
                "price" => "50",
                "image" => "https://product.hstatic.net/1000256920/product/upload_e0ebbdbc104142f2b07c475f185b1926_master.jpg",
                "quantity" => "6",
                "description" => "Sofa giường hiện nay đang trở thành một trong những vật dụng phổ biến trong ngôi nhà của nhiều gia đình. Bởi lẽ, sofa giường có rất nhiều tính năng nổi bật, bên cạnh sử dụng làm ghế để tiếp khách, tụ tập bạn bè, đây còn là một chiếc giường dùng để nghỉ ngơi đem tới cho bạn sự thoải mái mỗi khi sử dụng.",
                "category_id" => 1,
            ],
            [
                "name" => "ĐÈN NGỦ CÂY HAI BÓNG",
                "price" => "60",
                "image" => "https://product.hstatic.net/1000256920/product/upload_433f637499ec4bba83583f0a7e85cada_master.jpg",
                "quantity" => "6",
                "description" => "Phasellus vel elit non dui eleifend euismod eget eget mi. Mauris posuere, mi sit amet imperdiet feugiat.",
                "category_id" => 2,
            ],
            [
                "name" => "BÀN LÀM VIỆC THÔNG MINH",
                "price" => "60",
                "image" => "https://product.hstatic.net/1000256920/product/upload_1e376cef4a4849a885d609f3db5b1e84_master.jpg",
                "quantity" => "7",
                "description" => "Phasellus vel elit non dui eleifend euismod eget eget mi. Mauris posuere, mi sit amet imperdiet feugiat.",
                "category_id" => 3,
            ],
            [
                "name" => "BÀN TRÒN MỘT CHÂN",
                "price" => "20",
                "image" => "https://product.hstatic.net/1000256920/product/upload_cefdd6fd9a4947cea7bfafa0f1a8c093_master.jpg",
                "quantity" => "3",
                "description" => "Phasellus vel elit non dui eleifend euismod eget eget mi. Mauris posuere, mi sit amet imperdiet feugiat.",
                "category_id" => 4,
            ],
            [
                "name" => "GHẾ SOFA UNI 8424",
                "price" => "40",
                "image" => "https://product.hstatic.net/1000256920/product/upload_2a07cad3820542f7be95b26b1dc29cd7_master.jpg",
                "quantity" => "5",
                "description" => "Sofa giường hiện nay đang trở thành một trong những vật dụng phổ biến trong ngôi nhà của nhiều gia đình. Bởi lẽ, sofa giường có rất nhiều tính năng nổi bật, bên cạnh sử dụng làm ghế để tiếp khách, tụ tập bạn bè, đây còn là một chiếc giường dùng để nghỉ ngơi đem tới cho bạn sự thoải mái mỗi khi sử dụng.",
                "category_id" => 1,
            ],
            [
                "name" => "SOFA 2 CHỖ UNI 5424324323",
                "price" => "50",
                "image" => "https://product.hstatic.net/1000256920/product/upload_e0ebbdbc104142f2b07c475f185b1926_master.jpg",
                "quantity" => "6",
                "description" => "Sofa giường hiện nay đang trở thành một trong những vật dụng phổ biến trong ngôi nhà của nhiều gia đình. Bởi lẽ, sofa giường có rất nhiều tính năng nổi bật, bên cạnh sử dụng làm ghế để tiếp khách, tụ tập bạn bè, đây còn là một chiếc giường dùng để nghỉ ngơi đem tới cho bạn sự thoải mái mỗi khi sử dụng.",
                "category_id" => 1,
            ],
            [
                "name" => "ĐÈN NGỦ CÂY HAI BÓNG",
                "price" => "60",
                "image" => "https://product.hstatic.net/1000256920/product/upload_433f637499ec4bba83583f0a7e85cada_master.jpg",
                "quantity" => "6",
                "description" => "Phasellus vel elit non dui eleifend euismod eget eget mi. Mauris posuere, mi sit amet imperdiet feugiat.",
                "category_id" => 2,
            ],
            [
                "name" => "BÀN LÀM VIỆC THÔNG MINH",
                "price" => "60",
                "image" => "https://product.hstatic.net/1000256920/product/upload_1e376cef4a4849a885d609f3db5b1e84_master.jpg",
                "quantity" => "7",
                "description" => "Phasellus vel elit non dui eleifend euismod eget eget mi. Mauris posuere, mi sit amet imperdiet feugiat.",
                "category_id" => 3,
            ],
            [
                "name" => "BÀN TRÒN MỘT CHÂN",
                "price" => "20",
                "image" => "https://product.hstatic.net/1000256920/product/upload_cefdd6fd9a4947cea7bfafa0f1a8c093_master.jpg",
                "quantity" => "3",
                "description" => "Phasellus vel elit non dui eleifend euismod eget eget mi. Mauris posuere, mi sit amet imperdiet feugiat.",
                "category_id" => 4,
            ],
        ]);
    }
}
