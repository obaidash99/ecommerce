<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadAbout extends Model
{
    use HasFactory;

    protected $table = 'head_abouts';

    protected $fillable = [
        'status',
        'heading',
        'description',
        'heading_btn_1',
        'heading_btn_2',
        'image',
    ];
}
