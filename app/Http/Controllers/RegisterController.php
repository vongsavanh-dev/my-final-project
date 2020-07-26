<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Session;
use  Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Register;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*  $registers = Register::all();
        return view('REGISTER.index')->with('registers', $registers); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*  $registers = Register::all();
        return view('REGISTER.Register-newstudent')
            ->with('registers', $registers)
            ->with('majors', Major::all())
            ->with('sessions', Session::all()); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        /* $id = IdGenerator::generate(['table' => 'registers', 'field' => 'register_id', 'length' => 10, 'prefix' => 'RGT20-']);
        Register::create([
            'register_id' => $id,
            'register_name' => $request->register_name,
            'register_surname' => $request->register_surname,
            'register_gender' => $request->register_gender,
            'register_phone' => $request->register_phone,
            'register_village' => $request->register_village,
            'register_city' => $request->register_city,
            'register_province' => $request->register_province,
            'register_dob' => $request->register_dob,
            'register_religion' => $request->register_religion,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'father_phone' => $request->father_phone,
            'mother_phone' => $request->mother_phone,
            'major_id' => $request->major_id,
            'session_id' => $request->session_id,

        ]);
        session()->flash('status', 'ລົງທະບຽນສຳເລັດ');
        return redirect(route('studentregister.create')); */
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
        /* $registers = Register::findOrfail($id);
        return view('REGISTER.edit')->with('registers', $registers)
            ->with('majors', Major::all())
            ->with('sessions', Session::all()); */
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
}
