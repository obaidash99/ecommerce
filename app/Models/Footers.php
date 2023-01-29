<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footers extends Model
{
    use HasFactory;

    protected $table = 'footers';

    protected $fillable = [
        'title',
        'description',
        'main-image',
        'social_1_content',
        'social_1_link',
        'social_1_img',
        'social_2_content',
        'social_2_link',
        'social_2_img',
        'social_3_content',
        'social_3_link',
        'social_3_img',
        'social_4_content',
        'social_4_link',
        'social_4_img',
    ];
}
