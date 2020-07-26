<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    public function show()
    {
        return view('SCORE.importscore');
    }
    public function store(Request $request)
    {
        $file = $request->file;
        Excel::import(new ExcelImport, $file);
    }
}
