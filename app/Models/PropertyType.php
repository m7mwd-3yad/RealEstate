<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\Guard;

class PropertyType extends Model
{
    use HasFactory;
    protected $guarded = [];
}
