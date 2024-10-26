<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Chạy migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 255); 
            $table->string('sku', 100)->unique(); 
            $table->string('slug', 255)->unique(); 
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable(); 
            $table->foreignId('category_id')->constrained('categories','id'); 
            $table->foreignId('brand_id')->constrained('brands','id'); 
            $table->tinyInteger('status')->default(1); 
            $table->timestamps(); 
            $table->softDeletes();
        });
    }

    /**
     * Hoàn tác migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
