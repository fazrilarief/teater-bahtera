<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_assessment';

    protected $fillable = [
        'members_id',
        'criterias_id',
        'sub_criterias_id',
        'members_name',
        'members_code',
        'criteria_name',
        'category',
        'sub_criteria_name',
        'sub_criteria_value',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'members_id', 'id_member');
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class, 'criterias_id', 'id_criteria');
    }

    public function subCriteria()
    {
        return $this->belongsTo(SubCriteria::class, 'sub_criterias_id', 'id_sub_criteria');
    }
}
