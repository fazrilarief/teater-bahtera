<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_criteria_name',
        'sub_criteria_value',
        'criterias_id',
    ];

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
