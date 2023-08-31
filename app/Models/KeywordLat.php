<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeywordLat extends Model
{
    use HasFactory;
    protected $table = 'keyword_lats';
    protected $fillable = [
        'keyword_lat',
        'mappingData_id'
    ];


    public function mappingData()
    {
        return $this->belongsTo(MappingData::class,'mappingData_id');
    }
}
