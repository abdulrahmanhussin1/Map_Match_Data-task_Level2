<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchingData extends Model
{
    use HasFactory;
    protected $table = 'matching_data';
    protected $fillable = [
        'keyword_ar_id',
        'keyword_en_id',
        'keyword_lat_id',
    ];
    public function keyword_ar()
    {
        return $this->belongsTo(KeywordAr::class, 'keyword_ar_id');
    }

    public function keyword_en()
    {
        return $this->belongsTo(KeywordEn::class, 'keyword_en_id');
    }

    public function keyword_lat()
    {
        return $this->belongsTo(KeywordLat::class, 'keyword_lat_id');
    }
}
