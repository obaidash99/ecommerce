<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadHome extends Model
{
    use HasFactory;

    protected $table = 'head_homes';

    protected $fillable = [
        'title',
        'description',
        'btn_1_content',
        'btn_2_content',
        'image'
    ];
}
