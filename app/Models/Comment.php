<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=[
        'author' ,
        'content',
        'user_id' ,
        'product_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship to the product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
