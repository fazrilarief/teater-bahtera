<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_name',
        'member_code',
        'gender',
        'nis',
        'nisn',
        'whatsapp',
        'email',
        'birthday',
        'grade',
        'major',
        'class_code',
        'structure',
        'interest',
    ];
}
