<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'members_id',
        'members_name',
        'result',
        'period',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'members_id');
    }
}
