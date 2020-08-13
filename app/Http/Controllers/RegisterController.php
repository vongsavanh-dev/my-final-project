<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Session;
use  Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Register;
use App\Http\Requests\RegisterRequest;
use App\Models\Student;
use DB;
use Illuminate\Foundation\Console\Presets\React;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $searchStudentId = '';
        $checkMajor = [];
        return view('REGISTER.RegisterScond', compact('searchStudentId', 'checkMajor'));
    }

    public function searchregister(Request $request)
    {
        $searchStudentId = Student::where('st_id', $request->searchregister)
            ->first();
        $checkMajor = Register::select('registers.id as registerId', 'major.id as majorId', 'major.major_name')
            ->where('st_id', $searchStudentId->id)
            ->leftjoin('majors as major', 'major.id', '=', 'registers.major_id')
            ->first();
        return view('REGISTER.RegisterScond', compact('searchStudentId', 'checkMajor'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
    }












    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
    }
}
