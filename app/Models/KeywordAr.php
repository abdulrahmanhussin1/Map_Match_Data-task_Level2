<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeywordAr extends Model
{
    use HasFactory;
    protected $table = 'keyword_ars';
    protected $fillable = [
        'keyword_ar',
        'mappingData_id'
    ];

    public function mappingData()
    {
        return $this->belongsTo(MappingData::class,'mappingData_id');
    }
}
