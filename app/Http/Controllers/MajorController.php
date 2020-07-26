<?php

namespace App\Http\Controllers;

use App\Http\Requests\MajorRequest;
use Illuminate\Http\Request;
use App\Models\Major;
use DB;
use PDF;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $majors = Major::all(); // get all data
        $majors = Major::paginate(5);
        return View('MAJOR.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('MAJOR.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function searchmajor(Request $request)
    {

        $search = $request->get('searchmajor');
        if ($search != '') {
            $majors = DB::table('majors')->where('major_name', 'like', '%' . $search . '%')
                ->orwhere('major_id', 'like', '%' . $search . '%')
                ->paginate(5);

            return view('MAJOR.index')->with('majors', $majors);
        } else {
            $majors = Major::paginate(5);
            return view('MAJOR.index')->with('majors', $majors);
        }
    }

    public function store(MajorRequest $request)
    {
        $request->validate([

            'major_name' => 'required',

        ]);
        $id = IdGenerator::generate(['table' => 'majors', 'field' => 'major_id', 'length' => 10, 'prefix' => 'MAJOR-']);
        Major::create([

            'major_id' => $id,
            'major_name' => $request->major_name,
        ]);
        session()->flash('status', 'ບັນທຶກຂໍ້ມູນສຳເລັດ');
        return redirect(route('major.index'));
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
        $majors = Major::findOrfail($id);
        return view('MAJOR.edit')->with('majors', $majors);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MajorRequest $request, $id)
    {
        $data = $request->all(['major_name']);
        $majors = Major::find($id);
        $majors->major_name = $request->major_name;
        $majors->update($data);
        session()->flash('update', 'ອັບເດດຂໍ້ມູນສຳເລັດ');
        return redirect(route('major.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $majros = Major::find($id);
        $majros->delete();
        alert()->success('ລຶບຂໍ້ມູນສຳເລັດ');
        return redirect(route('major.index'));
    }

    //report function

    public function pdfreportmajor()
    {
        $majors = Major::all();
        $pdf = PDF::loadview('MAJOR.reportmajor', ['majors' => $majors]);
        return $pdf->stream('document.pdf');
    }
}
