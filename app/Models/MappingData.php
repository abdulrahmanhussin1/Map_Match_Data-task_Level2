<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappingData extends Model
{
    use HasFactory;
    protected $table ='mapping_data';
    protected $fillable =[
        'description',
        'condition',
        'mainData_id'
    ];
    public function mainData()
    {
        return $this->belongsTo(MainData::class,'mainData_id');
    }
}
