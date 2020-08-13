<!DOCTYPE html>
<html lang="en">

<head>
    @include('Common.header')
    {{-- datetimepicker --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    {{-- datetimepicker --}}

</head>

<body style="background: #f5f6fa">
    <div class="jumbotron" style="background: #ffda79; padding:25px;">
        <div class="row">
            <div class="col-md-3">
                <img src="/fontend/images/laovieng.png" alt="" class="rounded mx-auto d-block"
                    {{-- style="width:140px; height:140px;" --}}>
            </div>
            <div class="col-md-9" style="margin-top: 10px; margin-left:0;">
                <h1 style="font-weight: 900;font-size:60px;"><span>ວິທະຍາໄລ</span> ລາວວຽງ</h1>
                <h2 style="font-weight: 900;font-size:40px;font-family:'Times New Roman', Times, serif">
                    Laovieng <span
                        style="color:#ffff;font-family:Georgia, 'Times New Roman', Times, serif">College</span>
                </h2>
                <span>
                    <h3>ແບບຟອມລົງທະບຽນ</h3>
                </span>

            </div>

        </div>

    </div>
    <div class="container">
        <div class="card-body">
            <form action="{{route('student.store')}}" method="POST">
                @csrf
                <fieldset class="border p-2">
                    <legend class="w-auto">ຂໍ້ມູນສ່ວນຕົວ</legend>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">ເລືອກເພດ</label>
                            <select class="form-control" name="st_gender">
                                <option value="ທ້າວ">ທ້າວ</option>
                                <option value="ນາງ">ນາງ</option>
                                <option value="ພຣະ">ພຣະ</option>
                            </select>
                            <br>
                            @if ($errors->has('st_gender'))
                            <small class="text-danger">
                                <h6>{{$errors->first('st_gender')}}</h6>
                            </small>
                            @endif
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">ປ້ອນຊື່</label>
                                <input type="text" class="form-control" name="st_name">
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
                                <input type="text" class="form-control" name="st_surname">
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
                                <input type="text" class="form-control" name="st_tel" <br>
                                @if ($errors->has('st_tel'))
                                <small class="text-danger">
                                    <h6>{{$errors->first('st_tel')}}</h6>
                                </small>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">ບ້ານ</label>
                                <input type="text" class="form-control" name="st_village">
                                <br>
                                @if ($errors->has('st_village'))
                                <small class="text-danger">
                                    <h6>{{$errors->first('st_village')}}</h6>
                                </small>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            {{--  <div class="form-group"> --}}
                            <label for="province">ແຂວງ</label>
                            <select name="st_province" id="province" class="form-control province">
                                <option value="">ເລືອກແຂວງ</option>
                                @foreach ($list as $item)
                                <option value="{{$item->pr_name}}">{{$item->pr_name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('st_province'))
                            <small class="text-danger">
                                <h6>{{$errors->first('st_province')}}</h6>
                            </small>
                            @endif
                            {{-- </div> --}}
                        </div>

                        <div class="col-md-3">
                            <label for="province">ເມືອງ</label>
                            <select name="district_id" id="district" class="form-control district">
                                <option value="">ເລືອກເມືອງ</option>
                                @foreach ($district as $item)
                                <option value="{{$item->dr_id}}">{{$item->dr_name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('st_city'))
                            <small class="text-danger">
                                <h6>{{$errors->first('st_city')}}</h6>
                            </small>
                            @endif
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="">ວັນເດືອນປີເກີດ</label>
                            <input class="date form-control" type="date" {{-- id="datepicker" --}} name="st_dob">
                            <br>
                            @if ($errors->has('st_dob'))
                            <small class="text-danger">
                                <h6>{{$errors->first('st_dob')}}</h6>
                            </small>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <label for="">ສາສະໜາ</label>
                            <input type="text" class="form-control" name="religion">
                            <br>
                            @if ($errors->has('religion'))
                            <small class="text-danger">
                                <h6>{{$errors->first('religion')}}</h6>
                            </small>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label for="">ເລືອກສາຂາຮຽນ</label>
                            <select class="form-control" name="major_id">
                                <option selected>---ເລືອກສາຂາຮຽນ---</option>
                                @foreach ($majors as $major)
                                <option value="{{$major->id}}">{{$major->major_name}}</option>
                                @endforeach
                            </select>
                            <br>
                            @if ($errors->has('major_id'))
                            <small class="text-danger">
                                <h6>{{$errors->first('major_id')}}</h6>
                            </small>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label for="">ເລືອກພາກຮຽນ</label>
                            <select class="form-control" name="session_name">
                                <option>ພາກເຊົ້າ</option>
                                <option>ພາກບ່າຍ</option>
                                <option>ພາກຄ່ຳ</option>
                            </select>
                            <br>
                            @if ($errors->has('session_name'))
                            <small class="text-danger">
                                <h6>{{$errors->first('session_name')}}</h6>
                            </small>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="">ສົກຮຽນ</label>
                            <select class="form-control" name="academic_id">
                                <option selected>-----ສົກຮຽນ-----</option>
                                @foreach ($academics as $academic)
                                <option value="{{$academic->id}}">{{$academic->Ac_name}}</option>
                                @endforeach
                            </select>
                            <br>
                            @if ($errors->has('academic_id'))
                            <small class="text-danger">
                                <h6>{{$errors->first('academic_id')}}</h6>
                            </small>
                            @endif
                        </div>
                    </div>
                </fieldset>

                <br>

                <fieldset class="border p-2">
                    <legend class="w-auto">ຂໍ້ມູນກ່ຽວກັບຜູ້ປົກຄອງ</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">ຊື່ຜູ້ປົກຄອງ</label>
                                <input type="text" class="form-control" name="parent_name">
                                <br>
                                @if ($errors->has('parent_name'))
                                <small class="text-danger">
                                    <h6>{{$errors->first('parent_name')}}</h6>
                                </small>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">ເບີໂທຜູ້ປົກຄອງ</label>
                                <input type="text" class="form-control" name="parent_tel">
                                <br>
                                @if ($errors->has('parent_tel'))
                                <small class="text-danger">
                                    <h6>{{$errors->first('parent_tel')}}</h6>
                                </small>
                                @endif
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-success col-md-12">ລົງທະບຽນ
                                    (Register)</button>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <a href="" class="btn btn-danger col-md-12">ຍົກເລີກ (Cancel)</a>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    {{--   <script type="text/javascript">
        $('#datepicker').datepicker({
                        autoclose: true,
                        format: 'yyyy-mm-dd'
    });
    </script> --}}




    <script type="text/javascript">
        @if (session()->has('status')) {
        swal({
        title:"<?php echo session()->get('status');?>",
        icon: "success",
        text:"ກະລຸນາເກັບລະຫັດລົງທະບຽນເພື່ອໃຊ້ຍືນຍັນ ",
        timer:100000,
        type:'success',
        button:'ຕົກລົງ',
        });
    }@elseif(session()->has('update')) {
        swal({
        title:"<?php echo session()->get('update');?>",
        icon: "success",
        text:"ຂໍ້ມູນຖືກອັບເດດແລ້ວ",
        timer:5000,
        type:'success',
        button:'ຕົກລົງ',


        });

    }

@endif
    </script>

    <script type="text/javascript">
        $('.province').change(function(){
            if($(this).val()!=''){
                var select = $(this).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{route('dropdown.fetch')}}",
                    method:"POST",
                    data:{select:select,_token:_token},
                    success:function(result){

                            $('.district').html(result);
                    }

                });
            }

        });

    </script>
</body>

</html>
