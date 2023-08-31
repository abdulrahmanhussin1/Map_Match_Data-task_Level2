<?php

namespace App\Http\Controllers;

use file;
use App\Models\MainData;
use App\Models\MappingData;
use Illuminate\Http\Request;
use App\Imports\MappingDataImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\MappingDataRequest;
use App\Http\Requests\ImportMainDataRequest;

class MappingDataController extends Controller
{
    public function index()
    {
        $mappingData = MappingData::whereNull('mainData_id')->whereNull('condition')->paginate(5);
        $mappedData =  MappingData::whereNotNull('mainData_id')->whereNotNull('condition')->paginate(5);
        $mainData = MainData::paginate(5);

        return view('mappingData', compact('mappingData', 'mainData', 'mappedData'));
    }



    public function import(ImportMainDataRequest $request)
    {
        $request->validated();
        try {
            $file = $request->file('excel_file');
            Excel::import(new MappingDataImport, $file);
            return redirect()->back()->with('Add', 'Mapping Data added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred during import: ' . $e->getMessage());
        }
    }

    public function store(MappingDataRequest $request)
    {
        $request->validate([
            'description' =>'required'
        ]);
        MappingData::create([
            'mainData_id' => $request->mainData_id,
            'condition' => $request->condition,
            'description' => $request->description,
        ]);
        return redirect()->route('mappingData')->with('success', 'Mapping created successfully.');
    }


    public function mapData(MappingDataRequest $request)
    {

        $mappingData = MappingData::findOrFail($request->id);
        $mappingData->update([
            'mainData_id' => $request->mainData_id,
            'condition' => $request->condition,
        ]);
        return redirect()->back()->with('Add', 'Data Mapped successfully');
    }


    public function destroy(Request $request)
    {
        $mappingData = MappingData::findOrFail($request->id);
        $mappingData->delete();
        return back()->with('Delete', 'data deleted Successfully ');
    }



}
