<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/students/' . $value),
        );
    }
}
