@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{route('student.index')}}"><i class='far fa-arrow-alt-circle-left' style='font-size:40px'></i></a>
        </div>
        <div class="card-body">
            <form action="{{route('student.update',$student->id)}}" method="POST">
                @csrf
                {{method_field('PUT')}}
                <fieldset class="border p-2">
                    <legend class="w-auto">ຟອມແກ້ໄຂຂໍ້ມູນນັກສຶກສາ</legend>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="">ເພດ</label>
                            <input type="text" class="form-control" value="{{$student->st_gender}}" name="st_gender">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">ຊື່</label>
                            <input type="text" class="form-control" value="{{$student->st_name}}" name="st_name">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">ນາມສະກຸນ</label>
                            <input type="text" class="form-control" value="{{$student->st_surname}}" name="st_surname">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">ວັນເດືອນປີເກີດ</label>
                            <input type="text" class="form-control" value="{{$student->st_dob}}" name="st_dob">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="">ເບີໂທລະສັບ</label>
                            <input type="text" class="form-control" value="{{$student->st_phone}}" name="st_phone">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">ບ້ານຢູ່ປະຈຸບັນ</label>
                            <input type="text" class="form-control" value="{{$student->st_village}}" name="st_village">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">ເມືອງ</label>
                            <input type="text" class="form-control" value="{{$student->st_city}}" name="st_city">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">ແຂວງ</label>
                            <input type="text" class="form-control" value="{{$student->st_province}}"
                                name="st_province">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="" class="text-center">ສາສະໜາ</label>
                            <input type="text" class="form-control" value="{{$student->st_religion}}"
                                name="st_religion">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">ສາຂາຮຽນ</label>
                            {{-- <input type="text" class="form-control" value="{{$student->major->major_name}}"
                            name="major_id"> --}}

                            <select name="major_id" class="form-control">
                                @foreach ($majors as $major)
                                <option value="{{$major->id}}" @if(isset($student)) @if($major->id ==
                                    $student->major_id)
                                    selected
                                    @endif
                                    @endif
                                    >{{$major->major_name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group col-md-3">
                            <label for="">ພາກຮຽນ</label>
                            {{--    <input type="text" class="form-control" value="{{$student->session->session_name}}"
                            name="session_id"> --}}

                            <select name="session_id" class="form-control">
                                @foreach ($sessions as $session)
                                <option value="{{$session->id}}" @if(isset($student)) @if($session->id ==
                                    $student->session_id)
                                    selected
                                    @endif
                                    @endif
                                    >{{$session->session_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </fieldset>

                <br>

                {{--   ຜູ້ປົກຄອງ --}}
                <fieldset class="border p-2">
                    <legend class="w-auto">ຂໍ້ມູນຜູ້ປົກຄອງ</legend>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">ຊື່ພໍ່</label>
                            <input type="text" class="form-control" value="{{$student->father_name}}"
                                name="father_name">
                        </div>
                        <div class="form-grop col-md-4">
                            <label for="">ເບີໂທຕິດຕໍ່</label>
                            <input type="text" class="form-control" value="{{$student->father_phone}}"
                                name="father_phone">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">ອາຊີບ</label>
                            <input type="text" class="form-control" value="{{$student->father_job}}" name="father_job">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">ຊື່ແມ່</label>
                            <input type="text" class="form-control" value="{{$student->mother_name}}"
                                name="mother_name">
                        </div>
                        <div class="form-grop col-md-4">
                            <label for="">ເບີໂທຕິດຕໍ່</label>
                            <input type="text" class="form-control" value="{{$student->mother_phone}}"
                                name="mother_phone">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">ອາຊີບ</label>
                            <input type="text" class="form-control" value="{{$student->mother_job}}" name="mother_job">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">ບ້ານຢູ່</label>
                            <input type="text" class="form-control" value="{{$student->family_village}}"
                                name="family_village">
                        </div>
                        <div class="form-grop col-md-4">
                            <label for="">ເມືອງ</label>
                            <input type="text" class="form-control" value="{{$student->family_city}}"
                                name="family_city">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">ແຂວງ</label>
                            <input type="text" class="form-control" value="{{$student->family_province}}"
                                name="family_province">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="submit" class="btn btn-success">ອັບເດດ</button>
                        <a href="{{route('student.index')}}" class="btn btn-danger">ຍົກເລີກ</a>
                    </div>
        </div>
        </fieldset>
        </form>
    </div>
</div>
</div>
@include('sweetalert::alert')
@stop
