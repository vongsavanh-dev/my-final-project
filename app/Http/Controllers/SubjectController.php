<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use Illuminate\Http\Request;
use App\Models\Subject;
use DB;
use PDF;
use App\Models\Major;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use RealRashid\SweetAlert\Facades\Alert;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $subjects = Subject::paginate(5);
        return view('SUBJECT.index')->with('subjects', Subject::all())
            ->with('subjects', $subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SUBJECT.create')->with('majors', Major::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function searchsubject(Request $request)
    {

        /* $search = $request->get('search');
        $teachers = DB::table('teachers')->where('name', 'like', '%' . $search . '%')->paginate('5');
        return view('TEACHER.index')->with('teachers', $teachers); */

        $search = $request->get('searchsubject');
        if ($search != '') {

            $subjects = Subject::where('sub_name', 'like', '%' . $search . '%')
                ->orwhere('sub_id', 'like', '%' . $search . '%')

                ->paginate(5);

            return view('SUBJECT.index')->with('subjects', $subjects);
        }
    }



    public function store(SubjectRequest $request)
    {

        $id = IdGenerator::generate(['table' => 'subjects', 'field' => 'sub_id', 'length' => 8, 'prefix' => 'SUB-']);

        $subjects = new Subject();
        $subjects->sub_id = $id;
        $subjects->sub_name = $request->input("sub_name");
        $subjects->credit = $request->input("credit");
        $subjects->total_price = $request->input("total_price");
        $subjects->year_name = $request->input("year_name");
        $subjects->major_id = $request->input("major_id");
        $subjects->save();
        session()->flash('status', 'ບັນທຶກຂໍ້ມູນສຳເລັດ');
        return redirect()->route('subject.index');
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
    public function edit(Request $request, $id)
    {

        $subjects = Subject::findOrfail($id);

        return view('SUBJECT.edit')->with('subjects', $subjects)
            ->with('majors', Major::all());
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
        $data = $request->all(['sub_name', 'credit', 'major_id']);
        $subjects = Subject::find($id);
        $subjects->sub_name = $request->sub_name;
        $subjects->credit = $request->credit;
        $subjects->major_id = $request->major_id;
        $subjects->update($data);
        session()->flash('update', 'ອັບເດດຂໍ້ມູນສຳເລັດ');
        return redirect(route('subject.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subjects = Subject::find($id);
        $subjects->delete();
        alert()->success('ລຶບຂໍ້ມູນສຳເລັດ');
        return redirect()->back();
    }

    public function reportsubject()
    {
        $subjects = Subject::all();
        $spdf = PDF::loadView('SUBJECT.reportsubject', ['subjects' => $subjects]);
        return $spdf->stream('document');
    }
}
