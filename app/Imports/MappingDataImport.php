<?php

namespace App\Imports;

use App\Models\MainData;
use App\Models\MappingData;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use \Illuminate\Database\Eloquent\Model;


class MappingDataImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {

        $validator = Validator::make($row, [
            'description'=>'required|string|max:500'
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }

        return new MappingData([
            'description'=>$row['description'] ?? $row['Description'],
        ]);

    }
}
