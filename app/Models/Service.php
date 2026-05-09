<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // This tells Laravel which columns can be filled with data
    protected $fillable = ['icon', 'title', 'description'];
}
