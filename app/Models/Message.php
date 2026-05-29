<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // 💡 FIXED: Pointing directly to your true migration table name!
    protected $table = 'inquiries';

    // Allows form fields to fill columns safely without security exception crashes
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'is_read'
    ];

    // Explicitly casting this so Laravel treats it as a true true/false boolean flag
    protected $casts = [
        'is_read' => 'boolean',
    ];
}
