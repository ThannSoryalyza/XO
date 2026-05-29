<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    // Explicitly define the table name to prevent Laravel from guessing wrong
    protected $table = 'managers';

    protected $fillable = ['name', 'role', 'image'];
}
