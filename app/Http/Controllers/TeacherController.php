<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use DB;
use Illuminate\Http\Request;
use PDF;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $teachers = Teacher::all();
        $teachers = Teacher::paginate(5);
        return view('TEACHER.index')->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* ส่งเมืองไปสะแดงในฟอมอาจาน */
        $list = DB::table('province')
            ->orderBy('pr_name', 'asc')
            ->get();
        return view('TEACHER.create')->with('list', $list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function search(Request $request)
    {

        /* $search = $request->get('search');
        $teachers = DB::table('teachers')->where('name', 'like', '%' . $search . '%')->paginate('5');
        return view('TEACHER.index')->with('teachers', $teachers); */

        $search = $request->get('search');
        if ($search != '') {
            $teachers = DB::table('teachers')->where('name', 'like', '%' . $search . '%')
                ->orwhere('surname', 'like', '%' . $search . '%')
                ->paginate(5);

            return view('TEACHER.index')->with('teachers', $teachers);
        } else {
            $teachers = Teacher::paginate(5);
            return view('TEACHER.index')->with('teachers', $teachers);
        }
    }
    public function store(TeacherRequest $request)
    {
        $image = $request->image->store('teacherimage');
        $id = IdGenerator::generate(['table' => 'teachers', 'field' => 't_id', 'length' => 10, 'prefix' => 'TEA-']);
        Teacher::create([
            't_id' => $id,
            'name' => $request->name,
            'surname' => $request->surname,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'image' => $image,
            'village' => $request->village,
            'province' => $request->provinces,
            'district' => $request->district,
            'education' => $request->education,

        ]);
        session()->flash('status', 'ບັນທຶກຂໍ້ມູນສຳເລັດ');
        return redirect(route('teacher.index'));

        /* dd(request()->all()); */
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
    public function edit(Teacher $teacher)
    {
        $list = DB::table('province')
            ->orderBy('pr_name', 'asc')
            ->get();


        return view('TEACHER.edit')->with(compact('teacher', 'list'));
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

        $data = $request->all(['name', 'surname', 'gender', 'email', 'phone', 'village', 'provinces', 'district', 'education']);


        $teacher = Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->surname = $request->surname;
        $teacher->gender = $request->gender;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->village = $request->village;
        $teacher->province = $request->provinces;
        $teacher->district = $request->district;
        $teacher->education = $request->education;



        if ($request->hasFile('image')) {
            $image = $request->image->store('teacherimage');
            $teacher->deleteImage();
            $data['image'] = $image;
        }

        $teacher->update($data);
        session()->flash('update', 'ອັບເດດຂໍ້ມູນສຳເລັດ');
        return redirect(route('teacher.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(teacher $teacher)
    {
        $teacher->delete();
        $teacher->deleteImage();
        alert()->success('ລຶບຂໍ້ມູນສຳເລັດ');
        return redirect('/teacher');
    }


    public function fetch(Request $request)
    {
        $id = $request->get('select');
        $result = array();
        $query = DB::table('province')
            ->join('dristric', 'province.pr_id', '=', 'dristric.pr_id')
            ->select('dristric.dr_name')
            ->where('province.pr_name', $id)
            ->groupBy('dristric.dr_name')
            ->get();
        $output = '<option value="">ເລືອກເມືອງ</option>';
        foreach ($query as $row) {

            $output .= '<option value="' . $row->dr_name . '">' . $row->dr_name . '</option>';
        }
        echo $output;
    }

    public function reportteacher()
    {
        $teachers = Teacher::all();
        $tpdf = PDF::loadview('TEACHER.reportteacher', ['teachers' => $teachers]);
        return $tpdf->stream('document.pdf');
    }
}
