<?php

namespace App\Http\Controllers;


use App\Http\Requests\AcademicRequest;
use App\Models\Academic;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use DB;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academics = Academic::all();
        $academics = Academic::paginate(5);
        return view('Academicyear.index', compact('academics'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Academicyear.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function searchacademic(Request $request)
    {
        $search = $request->get('searchacademic');
        if ($search != '') {
            $academics = DB::table('academics')->where('Ac_name', 'like', '%' . $search . '%')
                ->orwhere('Ac_id', 'like', '%' . $search . '%')
                ->paginate(5);

            return view('Academicyear.index')->with('academics', $academics);
        } else {
            $academics = Academic::paginate(5);
            return view('Academicyear.index')->with('academics', $academics);
        }
    }
    public function store(AcademicRequest $request)
    {
        $id = IdGenerator::generate(['table' => 'academics', 'field' => 'Ac_id', 'length' => 10, 'prefix' => 'ACID-']);
        Academic::create([
            'Ac_id' => $id,
            'Ac_name' => $request->Ac_name,
        ]);
        session()->flash('status', 'ບັນທຶກຂໍ້ມູນສຳເລັດ');
        return redirect(route('academic.index'));
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
        $academics = Academic::findOrfail($id);
        return view('Academicyear.edit')->with('academics', $academics);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AcademicRequest $request, $id)
    {
        $data = $request->all(['Ac_name']);
        $academics = Academic::find($id);
        $academics->update($data);
        session()->flash('update', 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ');
        return redirect(route('academic.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $academics = Academic::find($id);
        $academics->delete();
        alert()->success('ລຶບຂໍ້ມູນສຳເລັດ');
        return redirect(route('academic.index'));
    }
}
