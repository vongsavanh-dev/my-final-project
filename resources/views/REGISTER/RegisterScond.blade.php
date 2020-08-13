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
                <img src="/fontend/images/laovieng.png" alt="" class="rounded mx-auto d-block" style="width: 150px"
                    height="150px" {{-- style="width:140px; height:140px;" --}}>
            </div>
            <div class="col-md-9" style="margin-top: 10px; margin-left:0;">
                <h1 style="font-weight: 900;font-size:40px;"><span>ວິທະຍາໄລ</span> ລາວວຽງ</h1>
                <h2 style="font-weight: 900;font-size:30px;font-family:'Times New Roman', Times, serif">
                    Laovieng <span
                        style="color:#ffff;font-family:Georgia, 'Times New Roman', Times, serif">College</span>
                </h2>
                <span>
                    <h4>ແບບຟອມລົງທະບຽນ</h4>
                </span>

            </div>

        </div>

    </div>
    <div class="container">
        <fieldset class="border p-2">
            <legend class="w-auto">ປ້ອນລະຫັດນັກສຶກສາ</legend>
            <form action="{{route('searchregister')}}" method="GET" class="col-md-12">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="ປ້ອນລະຫັດນັກສຶກສາ" name="searchregister"
                        aria-label="Search" />
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>

            </form>
            {{--   @php
            dd($registers)
            @endphp --}}
        </fieldset>
        <br>

        @if($checkMajor)
        <fieldset class="border p-2">
            <legend class="w-auto">ຂໍ້ມູນນັກສຶກສາ</legend>
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="">ເພດ</label>
                        <input type="text" class="form-control" value="{{$searchStudentId->st_gender}}"
                            name="st_gender">

                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">ຊື່</label>
                            <input type="text" class="form-control" name="st_name"
                                value="{{$searchStudentId->st_name}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">ນາມສະກຸນ</label>
                            <input type="text" class="form-control" name="st_surname"
                                value="{{$searchStudentId->st_surname}}">
                        </div>
                    </div>

                </div>



                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">ເບີໂທລະສັບ</label>
                            <input type="text" class="form-control" name="st_tel" value="{{$searchStudentId->st_tel}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">ບ້ານ</label>
                            <input type="text" class="form-control" name="st_village"
                                value="{{$searchStudentId->st_village}}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        {{--  <div class="form-group"> --}}
                        <label for="district">ແຂວງ</label>
                        <input type="text" class="form-control" name="st_provin">
                    </div>

                    <div class="col-md-3">
                        <label for="province">ເມືອງ</label>
                        <input type="text" class="form-control" name="st_city">
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-3">
                        <label for="">ວັນເດືອນປີເກີດ</label>
                        <input class="date form-control" type="date" {{-- id="datepicker" --}} name="st_dob">

                    </div>

                    <div class="col-md-3">
                        <label for="">ສາສະໜາ</label>
                        <input type="text" class="form-control" name="religion">

                    </div>
                    <div class="col-md-3">
                        <label for="">ເລືອກສາຂາຮຽນ</label>
                        <input type="text" class="form-control" name="major_id">
                        {{--   <select class="form-control" name="major_id">
                                            <option selected>---ເລືອກສາຂາຮຽນ---</option>
                                        @foreach ($majors as $major)
                                        <option value="{{$major->id}}">{{$major->major_name}}</option>
                        @endforeach
                        </select> --}}

                    </div>
                    <div class="col-md-3">
                        <label for="">ພາກຮຽນ</label>
                        <input type="text" class="form-control" name="session_name">

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="">ສົກຮຽນ</label>
                        <input type="text" class="form-control" name="academic_id">
                    </div>
                    <div class="col-md-5">
                        <label for="">ເລືອກປີຮຽນ</label>
                        <select name="year_name" id="" class="form-control">
                            <option value="ປີ2">ປີ2</option>
                            <option value="ປີ3">ປີ3</option>
                        </select>
                    </div>

                </div>
                <br>
                <div class="row">

                    <div class="form-group">
                        <button type="submit" id="submit" class="btn btn-success col-md-12">ຍືນຍັນ
                        </button>
                    </div>
                    <div class="form-group">
                        <a href="" class="btn btn-danger col-md-12">ຍົກເລີກ</a>
                    </div>
                </div>
            </form>
        </fieldset>
        @endif


    </div>





    <script type="text/javascript">
        @if (session()->has('status')) {
        swal({
        title:"<?php echo session()->get('status');?>",
        icon: "success",
        text:"ກະລຸນາເກັບລະຫັດລົງທະບຽນເພື່ອໃຊ້ຍືນຍັນ <?php echo $register->register_id;?>",
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
</body>

</html>
