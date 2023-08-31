<?php

namespace App\Http\Controllers;

use App\Models\KeywordAr;
use App\Models\KeywordEn;
use App\Models\KeywordLat;
use App\Models\MappingData;
use App\Models\MatchingData;
use Illuminate\Http\Request;

class MatchingDataController extends Controller
{
    public function index()
    {
        $matchingData = MatchingData::paginate(10);
        $keywordsAr = KeywordAr::paginate(5);
        $keywordsEn = KeywordEn::paginate(5);
        $keywordsLat = KeywordLat::paginate(5);
        $mappingData = MappingData::whereNull('mainData_id')->whereNull('condition')->paginate(5);

        $UnmappedKeywordsAr = KeywordAr::whereNull('mappingData_id')->paginate(5);
        $UnmappedKeywordsEn = KeywordEn::whereNull('mappingData_id')->paginate(5);
        $UnmappedKeywordsLat = KeywordLat::whereNull('mappingData_id')->paginate(5);


        $message = $this->getMappingDataMessage($mappingData);
        $keywordsMessages = $this->UnmappedKeywords($UnmappedKeywordsAr, $UnmappedKeywordsEn,$UnmappedKeywordsLat);

        return view('matchingData',compact('keywordsAr', 'keywordsEn', 'keywordsLat','matchingData','message', 'keywordsMessages'));
    }



    private function checkUnmappedData($mappingDataId) {
        $mappingData = MappingData::find($mappingDataId);
        
        if ($mappingData && is_null($mappingData->condition) && is_null($mappingData->mainData_id)) {
            return "Data are not mapped successfully, Please map Data";
        }
        
        return null;
    }
    


    public function store(Request $request)
    {

        $existingMatchingData = MatchingData::where([
            'keyword_ar_id' => $request->keyword_ar_id,
            'keyword_en_id' => $request->keyword_en_id,
            'keyword_lat_id' => $request->keyword_lat_id
        ])->first();
    
        if ($existingMatchingData) {
            return back()->withErrors('Matching data already exists.');
        }
        
        MatchingData::create([
            'keyword_ar_id' => $request->keyword_ar_id,
            'keyword_en_id' => $request->keyword_en_id,
            'keyword_lat_id' => $request->keyword_lat_id
        ]);

        return back()->with('Add', 'Keyword Matched Successfully');
    }

    public function update(Request $request)
    {
        $matchingData = MatchingData::findOrFail($request->id);
        $matchingData->update([
            'keyword_ar_id' => $request->keyword_ar_id,
            'keyword_en_id' => $request->keyword_en_id,
            'keyword_lat_id' => $request->keyword_lat_id
        ]);
        return back()->with('Edit', 'Keyword Matched Successfully');

    }
    public function getMappingDataMessage($mappingData)
    {
        $rowCount = $mappingData->count();
    
        if ($rowCount > 0) {
            return "There are Mapping Data Not MApped ";
        } else {
            return "there are no data to map";
        }
    }
    public function UnmappedKeywords($keywordsAr, $keywordsEn, $keywordLat)
    {
        $rowCountOfKeywordsAr = $keywordsAr->count();
        $rowCountOfKeywordsEn = $keywordsEn->count();
        $rowCountOfKeywordLat = $keywordLat->count();
    
        if ($rowCountOfKeywordsAr > 0 || $rowCountOfKeywordsEn > 0 || $rowCountOfKeywordLat > 0) {
            return "There are Keywords Not MApped ";
        } else {
            return "There is no keywords to map";
        }
    }
}
