<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    
    protected $fillable =['name', 'order_no', 'user_phone', 'product_code', 'product_name', 'product_price', 'purchase_quantity'];
}
