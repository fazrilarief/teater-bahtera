<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'members_id',
        'criterias_id',
        'sub_criterias_id',
        'criteria_name',
        'sub_criteria_name',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'members_id');
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class, 'criterias_id');
    }

    public function subCriteria()
    {
        return $this->belongsTo(SubCriteria::class, 'sub_criterias_id');
    }
}
