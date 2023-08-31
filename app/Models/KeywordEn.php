<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeywordEn extends Model
{
    use HasFactory;
    protected $table = 'keyword_ens';
    protected $fillable = [
        'keyword_en',
        'mappingData_id'
    ];

    public function mappingData()
    {
        return $this->belongsTo(MappingData::class,'mappingData_id');
    }
}
