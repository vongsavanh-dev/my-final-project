<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Session;
use App\Models\Major;
use App\Models\Student;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('STUDENT.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $list = DB::table('province')
            ->orderBy('pr_name', 'asc')
            ->get();
        $students = Student::all();
        return view('STUDENT.newstudentregister')
            ->with('students', $students)
            ->with('majors', Major::all())
            ->with('sessions', Session::all())
            ->with('list', $list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*  if ($request == '') {
            session()->flash('status', 'ບັນທຶກຂໍ້ມູນສຳເລັດ');
            return redirect(route('STUDENT.newstudentregister'));
        }
        $id = IdGenerator::generate(['table' => 'students', 'field' => 'st_id', 'length' => 10, 'prefix' => 'ST2020-']);
        Student::create([
            'st_id' => $id,
            'st_name' => $request->st_name,
            'st_surname' => $request->st_surname,
            'st_gender' => $request->st_gender,
            'st_phone' => $request->st_phone,
            'st_village' => $request->st_village,
            'st_city' => $request->st_city,
            'st_province' => $request->st_province,
            'st_dob' => $request->st_dob,
            'st_religion' => $request->st_religion,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'father_phone' => $request->father_phone,
            'mother_phone' => $request->mother_phone,
            'major_id' => $request->major_id,
            'session_id' => $request->session_id, */
        /*  'status_id' => $request->status_id, */



        /*  ]); */


        $student = Student::latest()->first();
        return view('STUDENT.billno')->with('student', $student);








        /*  $majors = DB::table('majors')->get();
 */

        /* return view('STUDENT.billno')->with('majors', $majors); */

        /*  $students = DB::select(DB::raw('select * from students where id = (select max(`id`) from students)')); */  //ສົ່ງໄອດີລ່າສຸດໄປ

        /* $students = DB::table('students')
            ->join('sessions', 'sessions.session_id', '=', 'sessions.id')
            ->get(); */

        /* return view('STUDENT.billno')->with('students', $students); */

        /*  return view('STUDENT.newstudentregister', compact('students')); */
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
        //
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
}
