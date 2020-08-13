<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Models\classroom;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = classroom::all();
        return view('CLASS.index')->with('classrooms', $classrooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CLASS.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassroomRequest $request)
    {
        $id = IdGenerator::generate(['table' => 'classrooms', 'field' => 'class_id', 'length' => 10, 'prefix' => 'CLASS-']);

        $classroom = new classroom();
        $classroom->class_id = $id;
        $classroom->class_name = $request->input("class_name");
        $classroom->save();
        session()->flash('status', 'ບັນທຶກຂໍ້ມູນສຳເລັດ');
        return redirect()->route('classroom.index');
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
        $classroom = classroom::findorfail($id);
        return view('CLASS.edit', compact('classroom'));
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
        $data = $request->all(['class_name']);
        $classroom = classroom::find($id);
        $classroom->class_name = $request->class_name;
        $classroom->update($data);
        session()->flash('update', 'ອັບເດດຂໍ້ມູນສຳເລັດ');
        return redirect(route('classroom.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classroom = classroom::find($id);
        $classroom->delete();
        alert()->success('ລຶບຂໍ້ມູນສຳເລັດ');
        return redirect()->back();
    }
}
