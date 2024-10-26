<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProductImagesTable extends Migration
{
    /**
     * Chạy migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
             // Khóa chính
             $table->id();
             // Khóa ngoại liên kết đến bảng products
             $table->foreignId('product_id')
                   ->constrained('products','id')
                   ->onDelete('cascade');
             // Trạng thái hoạt động
             $table->tinyInteger('is_active')->default(0);
             // Các trường timestamp
             $table->timestamps();
           
           
        });

       
    }

    /**
     * Hoàn tác migration.
     *
     * @return void
     */
    public function down()
    {
        

        Schema::dropIfExists('product_images');
    }
}
