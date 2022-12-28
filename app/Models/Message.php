<?php

namespace App\Models;

use App\Mail\ContactMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Message extends Model
{
    use HasFactory;

    public $fillable  = ['fname', 'lname', 'email', 'subject', 'content'];

    public static function boot() {
        parent::boot();

        static::created(function ($item) {
            $adminEmail = 'obaidashurbaji99@gmail.com';
            Mail::to($adminEmail)->send(new ContactMail($item));
        });
    }
}
