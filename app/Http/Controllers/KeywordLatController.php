<?php

namespace App\Http\Controllers;

use App\Models\KeywordLat;
use App\Models\MappingData;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKeywordsRequest;

class KeywordLatController extends Controller
{
    
    public function index()
    {
        $keywordsLat = KeywordLat::whereNull('mappingData_id')->paginate(5);
        $keywordsLatMapped = KeywordLat::whereNotNull('mappingData_id')->paginate(5);
        $mappedData =  MappingData::whereNotNull('mainData_id')->whereNotNull('condition')->paginate(10);
        return view('keywords.latin',compact('keywordsLat','mappedData','keywordsLatMapped'));
    }

    public function store(StoreKeywordsRequest $request)
    {
        $request->validated();
        KeywordLat::create([
            'keyword_lat' => $request->keyword_lat,
        ]);
        return redirect()->back()->with('Add', 'Keyword Added Successfully ');
    }

    public function update(Request  $request)
    {
        $request->validate([
            'mappingData_id' =>'required',
        ]);
        KeywordLat::findOrFail($request->id)->update([
            'mappingData_id' => $request->mappingData_id,
        ]);
        return redirect()->back()->with('Update', 'Keyword Updated Successfully ');
    }
}
