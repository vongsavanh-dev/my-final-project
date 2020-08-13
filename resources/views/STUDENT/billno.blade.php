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

<body>
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
                    {{--  <h3>ໃບລົງທະບຽນນັກສຶກສາ {{$student->session->session_name}}</h3> --}}
                    <h3>ໃບລົງທະບຽນນັກສຶກສາ {{$resgister->session_name}}</h3>
                </span>

            </div>

        </div>

    </div>
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h3 class="text-center">ໃບລົງທະບຽນນັກສຶກສາ</h3>
                <br>
                <div class="row">
                    <div class="col-4">
                        <h6>ເລກທະບຽນ ນສ: {{$resgister->reg_id}}</h6>
                    </div>
                    <div class="col-4">
                        <h6>ຊື່ ແລະ ນາມສະກຸນ:{{$resgister->st_gender}} {{$resgister->st_name}} &ensp;
                            {{$resgister->st_surname}} </h6>
                    </div>
                    <div class="col-4">
                        <h6>ເບີໂທລະສັບ: {{$resgister->st_tel}}</h6>
                    </div>

                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100%">
                        <thead>
                            <tr>
                                <th colspan="6" class="text-center">ລາຍວິຊາລົງທະບຽນຮຽນຂອງ ນສ( {{$resgister->year_name}}
                                    ສາຂາ
                                    {{$resgister->major->major_name}} ສົກຮຽນ {{$resgister->academic->Ac_name}})</th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th>ລະຫັດວິຊາ</th>
                                <th>ລະຫັດວິຊາ</th>
                                <th>ຈຳນວນໜ່ວຍກິດ</th>
                            </tr>
                        </thead>


                        <tbody>
                            @php
                            $credit = 0;
                            $total = 0;
                            @endphp
                            @foreach ($subjects as $row)
                            @php
                            $credit += $row->credit;
                            $total += $row->total_price;
                            @endphp
                            <tr>
                                <td>{{$row->sub_id}}</td>
                                <td>{{$row->sub_name}}</td>
                                <td>{{$row->credit}}</td>



                            </tr>
                            @endforeach
                            {{--   <tr>
                                            <td>
                                                  <p>Credit {{ $credit }}</p>
                            </td>
                            <td>
                                <p>Total {{ $total }}</p>
                            </td>
                            </tr> --}}

                            <tr>
                                <td colspan="2">ລວມໜ່ວຍກິດ</td>
                                <td>{{$credit}} ໜ່ວຍກິດ</td>

                            </tr>
                            <tr>
                                <td colspan="2">ລວມຈຳນວນເງິນ</td>
                                <td>{{$total}} ກີບ</td>
                            </tr>

                        </tbody>

                    </table>
                    <a href="{{route('studentreport', $resgister->id)}}" class="btn btn-primary"
                        target="_bank">ພິມໃບລົງທະບຽນ</a>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        @if (session()->has('status')) {
        swal({
        title:"<?php echo session()->get('status');?>",
        icon: "success",
        text:"ຂໍ້ມູນຖືກບັນທຶກລົງໃນຖານຂໍ້ມູນແລ້ວ",
        timer:2000,
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
