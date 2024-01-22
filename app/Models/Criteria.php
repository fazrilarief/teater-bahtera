<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'criteria_code',
        'criteria_name',
        'criteria_value',
        'category',
    ];
}
