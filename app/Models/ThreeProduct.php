<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreeProduct extends Model
{
    use HasFactory;

    protected $table = 'three_products';

    protected $fillable = [
        'title',
        'description',
        'btn_content'
    ];
}
