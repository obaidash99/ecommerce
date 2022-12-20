<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'adress1',
        'adress2',
        'city',
        'state',
        'country',
        'zipcode',
        'status',
        'message',
        'tracking_no',
    ];
}
