<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementHistories extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'chat',
        'document',
        'message_by',
    ];
}
