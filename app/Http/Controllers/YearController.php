<?php

namespace App\Http\Controllers;

use App\Http\Requests\YearRequest;
use App\Models\year;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use DB;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = year::all();
        $years = year::paginate(3);
        return view('YEAR.index', compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('YEAR.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function searchyear(Request $request)
    {
        $search = $request->get('searchyear');
        if ($search != '') {
            $years = DB::table('years')->where('year_name', 'like', '%' . $search . '%')
                ->orwhere('year_id', 'like', '%' . $search . '%')
                ->paginate(3);

            return view('YEAR.index')->with('years', $years);
        } else {
            $years = year::paginate(3);
            return view('YEAR.index')->with('year', $years);
        }
    }
    public function store(YearRequest $request)
    {
        $id = IdGenerator::generate(['table' => 'years', 'field' => 'year_id', 'length' => 10, 'prefix' => 'YEID-']);
        year::create([
            'year_id' => $id,
            'year_name' => $request->year_name,
        ]);
        session()->flash('status', 'ບັນທຶກຂໍ້ມຸນສຳເລັດ');
        return redirect(route('year.index'));
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
        $years = year::findOrfail($id);
        return view('YEAR.edit', compact('years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(YearRequest $request, $id)
    {
        $data = $request->all(['year_name']);
        $years = year::find($id);
        $years->update($data);
        session()->flash('update', 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ');
        return redirect(route('year.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $years = year::find($id);
        $years->delete();
        alert()->success('ລຶບຂໍ້ມູນສຳເລັດ');
        return redirect(route('year.index'));
    }
}
