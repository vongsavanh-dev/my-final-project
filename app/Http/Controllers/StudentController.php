<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Academic;
use App\Models\district;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Session;
use App\Models\Major;
use App\Models\Register;
use App\Models\Student;
use App\Models\Status;
use App\Models\Subject;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Support\Facades\DB;
use Mpdf\Tag\Sub;
use PDF;

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




        /*  $district = district::join('province as province', 'province.pr_id', '=', 'district.pr_id')
            ->where('district.pr_id')
            ->get(); */



        $list = DB::table('province')
            ->orderBy('pr_name', 'asc')
            ->get();

        $district = DB::table('dristric')
            ->orderBy('dr_id', 'asc')
            ->get();

        $students = Student::all();
        return view('STUDENT.newstudentregister')
            ->with('students', $students)
            ->with('majors', Major::all())
            ->with('sessions', Session::all())
            ->with('academics', Academic::all())
            ->with('list', $list)
            ->with('district', $district);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $id = IdGenerator::generate(['table' => 'students', 'field' => 'st_id', 'length' => 10, 'prefix' => 'ST2020-']);

        $students = new Student();
        $students->st_id = $id;
        $students->st_name = $request->input("st_name");
        $students->st_surname = $request->input("st_surname");
        $students->st_gender = $request->input("st_gender");
        $students->st_tel = $request->input("st_tel");
        $students->district_id = $request->input("district_id");
        $students->st_village = $request->input("st_village");
        $students->st_dob = $request->input("st_dob");
        $students->religion = $request->input("religion");
        $students->parent_name = $request->input("parent_name");
        $students->parent_tel = $request->input("parent_tel");
        $students->save();


        $reg_id = IdGenerator::generate(['table' => 'registers', 'field' => 'reg_id', 'length' => 10, 'prefix' => 'RG2020-']);
        $register = new Register();
        $register->reg_id = $reg_id;
        $register->st_id = $students->id;
        $register->major_id = $request->input("major_id");
        $register->session_name = $request->input("session_name");
        $register->academic_id = $request->input("academic_id");
        $register->save();

        session()->flash('status', 'ບັນທຶກຂໍ້ມູນສຳເລັດ');
        return redirect()->route('preview.info.student', $register->id);
    }

    # Preview-Info-Student
    public function PreviewInfoStudent($register_id)
    {
        $resgister = Register::join('students as student', 'student.id', '=', 'registers.st_id')
            ->where('registers.id', $register_id)
            ->first();
        $subjects = Subject::select(
            'subjects.sub_name',
            'marjor.major_name',
            'subjects.credit',
            'subjects.total_price',
            'subjects.sub_id',
            'subjects.year_name'
        )
            ->join('majors as marjor', 'marjor.id', '=', 'subjects.major_id')
            ->where('subjects.major_id', $resgister->major_id)
            ->where('year_name', 'ປີ1')
            ->get();
        return view('STUDENT.billno', compact('resgister', 'subjects'));
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
        $student = Student::findOrfail($id);
        $majors = Major::all();
        $sessions = Session::all();
        return view('STUDENT.edit')
            ->with('student', $student)
            ->with('majors', $majors)
            ->with('sessions', $sessions);
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
        $data = $request->all(

            [

                'st_name',
                'st_surname',
                'st_gender',
                'st_phone',
                'st_village',
                'st_city',
                'st_province',
                'st_dob',
                'st_religion',
                'father_name',
                'mother_name',
                'father_job',
                'mother_job',
                'father_phone',
                'mother_phone',
                'family_village',
                'family_city',
                'family_province',
                'major_id',
                'session_id',
            ]


        );
        $student = Student::find($id);
        $student->st_gender = $request->st_gender;
        $student->st_name = $request->st_name;
        $student->st_surname = $request->st_surname;
        $student->st_phone = $request->st_phone;
        $student->st_dob = $request->st_dob;
        $student->major_id = $request->major_id;
        $student->session_id = $request->session_id;
        $student->st_village = $request->st_village;
        $student->st_city = $request->st_city;
        $student->st_province = $request->st_province;
        $student->st_religion = $request->st_religion;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->father_phone = $request->father_phone;
        $student->mother_phone = $request->mother_phone;
        $student->father_job = $request->father_job;
        $student->mother_job = $request->mother_job;
        $student->family_village = $request->family_village;
        $student->family_city = $request->family_city;
        $student->family_province = $request->family_province;
        $student->update($data);
        session()->flash('update', 'ອັບເດດຂໍ້ມູນສຳເລັດ');
        return redirect(route('student.index'));
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

    public function report(Request $request, $register_id)
    {
        $resgister = Register::join('students as student', 'student.id', '=', 'registers.st_id')
            ->where('registers.id', $register_id)
            ->first();
        $subjects = Subject::select(
            'subjects.sub_name',
            'marjor.major_name',
            'subjects.credit',
            'subjects.total_price',
            'subjects.sub_id',
            'subjects.year_name'
        )
            ->join('majors as marjor', 'marjor.id', '=', 'subjects.major_id')
            ->where('subjects.major_id', $resgister->major_id)
            ->where('year_name', 'ປີ1')
            ->get();
        $spdf = PDF::loadView('STUDENT.Report', compact('resgister', 'subjects'));
        return $spdf->stream('document');
    }


    public function reportamountstudent()
    {
        $student = Student::all();
        $spdf = PDF::loadView('STUDENT.studentamountreport', compact('student'));
        return $spdf->stream('document');
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

            $output .= '<option value="' . $row->dr_name . '">'  . $row->dr_id . '</option>';
        }
        echo $output;
    }
}
