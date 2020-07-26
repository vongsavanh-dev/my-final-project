<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;

class ExcelImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            /* dd($key, $value); */
            if ($key > 0) {
                /*    dd($key, $value); */
                DB::table('scores')->insert([
                    'name' => $value[0],
                    'surname' => $value[1],
                    'class' => $value[2],
                    'garde' => $value[3]

                ]);
            }
        }
    }
}
