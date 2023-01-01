<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticAbout extends Model
{
    use HasFactory;

    protected $table = 'static_abouts';
    protected $fillable = [
        'status',
        'heading_title',
        'heading_desc',
        'heading_image',
        'heading_btn_1',
        'heading_btn_2',
        'why_us_title',
        'why_us_desc',
        'why_us_image',
    ];
}
