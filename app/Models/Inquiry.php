<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    //// app/Models/Inquiry.php
protected $fillable = ['name', 'email', 'subject', 'message', 'is_read'];
}
