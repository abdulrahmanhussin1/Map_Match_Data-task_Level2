<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainDataController;
use App\Http\Controllers\KeywordArController;
use App\Http\Controllers\KeywordEnController;
use App\Http\Controllers\KeywordLatController;
use App\Http\Controllers\MappingDataController;
use App\Http\Controllers\MatchingDataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", function () {
    return view("index");
})->name('home');


// MainData Routes
Route::get("/mainData",[MainDataController::class,'index'])->name('mainData');
Route::post("/importMainData",[MainDataController::class,'import'])->name('importData');
Route::post("/storeMainData",[MainDataController::class,'store'])->name('storeMainData');
Route::delete("/deleteMainData",[MainDataController::class,'destroy'])->name('deleteMainData');


// MappingData Routes
Route::get('/mappingData',[MappingDataController::class,'index'])->name('mappingData');
Route::post('/importMappingData',[ MappingDataController::class,'import'])->name('importMappingData');
Route::post('/storeMappingData',[ MappingDataController::class,'store'])->name('storeMappingData');
Route::post('/mapData',[MappingDataController::class,'mapData'])->name('mapData');
Route::delete("/deleteMappingData",[MappingDataController::class,'destroy'])->name('deleteMappingData');



// Keywords Routes
// Ar
Route::get('/arabicKeyword',[KeywordArController::class,'index'])->name('keywordAr');
Route::post("/storeArKeywords",[KeywordArController::class,'store'])->name('storeArKeywords');
Route::post("/mapKeywordAr",[KeywordArController::class,'update'])->name('mapKeywordAr');

//  En
Route::get('/englishKeyword',[KeywordEnController::class,'index'])->name('keywordEn');
Route::post("/storeEnKeywords",[KeywordEnController::class,'store'])->name('storeEnKeywords');
Route::post("/mapKeywordEn",[KeywordEnController::class,'update'])->name('mapKeywordEn');

// Lat
Route::get('/keywordLat',[KeywordLatController::class,'index'])->name('keywordLat');
Route::post("/storeLatKeywords",[KeywordLatController::class,'store'])->name('storeLatKeywords');
Route::post("/mapKeywordLat",[KeywordLatController::class,'update'])->name('mapKeywordLat');

// Matching Data
Route::get('/matchingData',[MatchingDataController::class,'index'])->name('matchingData');
Route::post('/matchData',[MatchingDataController::class,'store'])->name('matchData');
Route::post('/updateMatchData',[MatchingDataController::class,'update'])->name('updateMatchData');









/* 
Route::get("/mainData",[MainDataController::class,'index'])->name('mainData');
Route::delete("/deleteMainData",[MainDataController::class,'destroy'])->name('deleteMainData');
Route::post("/importMainData",[MainDataController::class,'import'])->name('importData');

Route::post('/importMappingData',[ DataMappingController::class,'import'])->name('importMappingData');
Route::get('/mappingData',[DataMappingController::class,'index'])->name('mappingData');
Route::post('/mapData',[DataMappingController::class,'update'])->name('mapData');

Route::get("/matchingData",[MatchingDataController::class,'index'])->name('matchingData');
Route::get('/matchingData/match',[MatchingDataController::class,'match']);
Route::post('/matchingData/match',[MatchingDataController::class,'match'])->name('DataMappingMatch');
Route::post("/storeKeywords",[MatchingDataController::class,'storeKeywords'])->name('storeKeywords');
Route::post("/updateKeywords",[MatchingDataController::class,'updateKeywords'])->name('updateKeywords');
Route::post("/matchData_ar",[MatchingDataController::class,'matchData_ar'])->name('matchData_ar');
Route::post("/matchData_en",[MatchingDataController::class,'matchData_en'])->name('matchData_en');
Route::post("/matchData_lat",[MatchingDataController::class,'matchData_lat'])->name('matchData_lat'); 

*/


/* 
Route::get("/matchedData/ar",[MatchingDataController::class,'arabicMatchedData'])->name('arabicMatchedData');
Route::get("/matchedData/en",[MatchingDataController::class,'englishMatchedData'])->name('englishMatchedData');
Route::get("/matchedData/lat",[MatchingDataController::class,'latinMatchedData'])->name('latinMatchedData');
Route::get("/getMainData/{id}", [MatchingDataController::class, 'getMainData'])->name('getMainData');
 */
