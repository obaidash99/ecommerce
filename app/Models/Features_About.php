<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features_About extends Model
{
    use HasFactory;
    protected $table = 'features__abouts';
    protected $fillable = ['title', 'description', 'image'];
}
