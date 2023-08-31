<?php

namespace App\Http\Controllers;

use App\Models\MainData;
use App\Models\KeywordAr;
use App\Models\MappingData;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKeywordsRequest;

class KeywordArController extends Controller
{
    public function index()
    {
        $keywordsAr = KeywordAr::whereNull('mappingData_id')->paginate(5);
        $keywordsArMapped = KeywordAr::whereNotNull('mappingData_id')->paginate(5);

        $mappedData =  MappingData::whereNotNull('mainData_id')->whereNotNull('condition')->paginate(5);
        return view('keywords.arabic',compact('keywordsAr','mappedData','keywordsArMapped'));
    }

    public function store(StoreKeywordsRequest $request)
    {
        $request->validated();
        KeywordAr::create([
            'keyword_ar' => $request->keyword_ar,
        ]);
        return redirect()->back()->with('Add', 'Keyword Added Successfully ');
    }

    public function update(Request  $request)
    {
        $request->validate([
            'mappingData_id' =>'required',
        ]);
        KeywordAr::findOrFail($request->id)->update([
            'mappingData_id' => $request->mappingData_id,
        ]);
        return redirect()->back()->with('Update', 'Keyword Updated Successfully ');
    }
}
