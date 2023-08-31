<?php

namespace App\Http\Controllers;

use App\Models\MainData;
use App\Imports\DataImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\MainDataStoreRequest;
use App\Http\Requests\ImportMainDataRequest;

class MainDataController extends Controller
{
    public function index()
    {
        $mainData = MainData::paginate(10);
        return view('mainData', compact('mainData'));
    }

    public function import(ImportMainDataRequest $request)
    {
        $request->validated();
        try {
            $file = $request->file('excel_file');
            Excel::import(new DataImport , $file);
            return redirect()->back()->with('Add', 'Main Data added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred during import: ' . $e->getMessage());
        }
        
    }
    public function store(MainDataStoreRequest $request)
    {
        $request->validated();
        MainData::create([
            'description' => $request->description
        ]);
        return redirect()->back()->with('Add', 'Main Data added successfully');
    }
    public function destroy(Request $request)
    {
        $mainData = MainData::findOrFail($request->id);
        $mainData->delete();
        return back()->with('Delete', 'data deleted Successfully ');
    }
}
