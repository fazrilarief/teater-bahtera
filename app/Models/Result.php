<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_result';
    protected $fillable = [
        'id_member',
        'member_name',
        'result',
        'period',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'members_id', 'id_member');
    }
}
