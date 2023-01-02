<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyAbout extends Model
{
    use HasFactory;
    protected $table = 'why_abouts';

    protected $fillable = [
        'status',
        'heading',
        'description',
        'image',
    ];
}
