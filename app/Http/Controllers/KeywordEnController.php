<?php

namespace App\Http\Controllers;

use App\Models\MainData;
use App\Models\KeywordEn;
use App\Models\MappingData;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKeywordsRequest;

class KeywordEnController extends Controller
{
    public function index()
    {
        $keywordsEn = KeywordEn::whereNull('mappingData_id')->paginate(5);
        $keywordsEnMapped = KeywordEn::whereNotNull('mappingData_id')->paginate(5);
        $mappedData =  MappingData::whereNotNull('mainData_id')->whereNotNull('condition')->paginate(10);
        return view('keywords.english',compact('keywordsEn','mappedData','keywordsEnMapped'));
    }

    public function store(StoreKeywordsRequest $request)
    {
        $request->validated();
        KeywordEn::create([
            'keyword_en' => $request->keyword_en,
        ]);
        return redirect()->back()->with('Add', 'Keyword Added Successfully ');
    }

    public function update(Request  $request)
    {
        $request->validate([
            'mappingData_id' =>'required',
        ]);
        KeywordEn::findOrFail($request->id)->update([
            'mappingData_id' => $request->mappingData_id,
        ]);
        return redirect()->back()->with('Update', 'Keyword Updated Successfully ');
    }
}
