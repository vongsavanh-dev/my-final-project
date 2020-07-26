@extends('layouts.master')
@section('content')
<div class="card-body">
    <form action="{{route('student.store')}}" method="POST">
        @csrf
        <fieldset class="border p-2">
            <legend class="w-auto">ຂໍ້ມູນສ່ວນຕົວ</legend>
            <div class="row">

                <div class="col-md-3">
                    <label for="">ເລືອກເພດ</label>
                    <select class="form-control" name="st_gender">
                        @foreach (App\Models\gender::all() as $gender)
                        <option value="{{$gender->gender}}">{{$gender->gender}}</option>
                        @endforeach
                    </select>
                    <br>
                    @if ($errors->has('register_gender'))
                    <small class="text-danger">
                        <h6>{{$errors->first('register_gender')}}</h6>
                    </small>
                    @endif
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="">ປ້ອນຊື່</label>
                        <input type="text" class="form-control" name="st_name" value="{{$registers->register_name}}">
                        <br>
                        @if ($errors->has('st_name'))
                        <small class="text-danger">
                            <h6>{{$errors->first('st_name')}}</h6>
                        </small>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">ນາມສະກຸນ</label>
                        <input type="text" class="form-control" name="st_surname"
                            value="{{$registers->register_surname}}">
                        <br>
                        @if ($errors->has('st_surname'))
                        <small class="text-danger">
                            <h6>{{$errors->first('st_surname')}}</h6>
                        </small>
                        @endif
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">ເບີໂທລະສັບ</label>
                        <input type="text" class="form-control" name="st_phone" value="{{$registers->register_phone}}">
                        <br>
                        @if ($errors->has('st_phone'))
                        <small class="text-danger">
                            <h6>{{$errors->first('st_phone')}}</h6>
                        </small>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">ບ້ານ</label>
                        <input type="text" class="form-control" name="st_village"
                            value="{{$registers->register_village}}">
                        <br>
                        @if ($errors->has('st_village'))
                        <small class="text-danger">
                            <h6>{{$errors->first('st_village')}}</h6>
                        </small>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">ເມືອງ</label>
                        <input type="text" class="form-control" name="st_city" value="{{$registers->register_city}}">
                        <br>
                        @if ($errors->has('st_city'))
                        <small class="text-danger">
                            <h6>{{$errors->first('st_city')}}</h6>
                        </small>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">ແຂວງ</label>
                        <input type="text" class="form-control" name="st_province"
                            value="{{$registers->register_province}}">
                        <br>
                        @if ($errors->has('st_province'))
                        <small class="text-danger">
                            <h6>{{$errors->first('st_province')}}</h6>
                        </small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="">ວັນເດືອນປີເກີດ</label>
                    <input class="date form-control" type="text" id="datepicker" name="st_dob"
                        value="{{$registers->register_dob}}">
                    <br>
                    @if ($errors->has('st_dob'))
                    <small class="text-danger">
                        <h6>{{$errors->first('st_dob')}}</h6>
                    </small>
                    @endif
                </div>

                <div class="col-md-3">
                    <label for="">ເລືອກສາສະໜາ</label>
                    <select class="form-control" name="st_religion">
                        @foreach (App\Models\religion::all() as $religion)
                        <option value="{{$religion->religion}}">{{$religion->religion}}</option>
                        @endforeach
                    </select>
                    <br>
                    @if ($errors->has('st_religion'))
                    <small class="text-danger">
                        <h6>{{$errors->first('st_religion')}}</h6>
                    </small>
                    @endif
                </div>

                <div class="col-md-3">
                    <label for="">ສາຂາຮຽນ</label>
                    <select class="form-control" name="major_id">
                        @foreach ($majors as $major)
                        <option value="{{$major->id}}" @if(isset($register))@if($major->id ==
                            $register->major_id)
                            selected
                            @endif
                            @endif
                            >{{$major->major_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="">ພາກຮຽນ</label>
                    <select class="form-control" name="session_id">
                        @foreach ($sessions as $session)
                        <option value="{{$session->id}}" @if(isset($register))@if($session->id == $register->session_id)
                            selected
                            @endif
                            @endif
                            >{{$session->session_name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="">ສະຖານະນັກສຶກສາ</label>
                    <select class="form-control" name="status_id">
                        @foreach (App\Models\Status::all() as $status)
                        <option value="{{$status->id}}">{{$status->status_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


        </fieldset>
        <br>
        <fieldset class="border p-2">
            <legend class="w-auto">ຂໍ້ມູນກ່ຽວກັບຜູ້ປົກຄອງ</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">ຊື່ພໍ່</label>
                        <input type="text" class="form-control" name="father_name" value="{{$registers->father_name}}">
                        <br>
                        @if ($errors->has('father_name'))
                        <small class="text-danger">
                            <h6>{{$errors->first('father_name')}}</h6>
                        </small>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">ຊື່ແມ່</label>
                        <input type="text" class="form-control" name="mother_name" value="{{$registers->mother_name}}">
                        <br>
                        @if ($errors->has('mother_name'))
                        <small class="text-danger">
                            <h6>{{$errors->first('mother_name')}}</h6>
                        </small>
                        @endif
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">ເບີໂທຕິດຕໍ່</label>
                        <input type="text" class="form-control" name="father_phone"
                            value="{{$registers->father_phone}}">
                        <br>
                        @if ($errors->has('father_phone'))
                        <small class="text-danger">
                            <h6>{{$errors->first('father_phone')}}</h6>
                        </small>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">ເບີໂທຕິດຕໍ່</label>
                        <input type="text" class="form-control" name="mother_phone"
                            value="{{$registers->mother_phone}}">
                        <br>
                        @if ($errors->has('mother_phone'))
                        <small class="text-danger">
                            <h6>{{$errors->first('mother_phone')}}</h6>
                        </small>
                        @endif
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="submit" id="submit" class="btn btn-success col-md-12">ຍືນຍັນ</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <a href="" class="btn btn-danger col-md-12">ຍົກເລີກ (Cancel)</a>
                    </div>
                </div>
            </div>
        </fieldset>


</div>



@endsection
