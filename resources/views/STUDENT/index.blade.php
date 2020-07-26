@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        {{--  @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error->sub_name }}</li>
        @endforeach
        </ul>
    </div>
    @endif --}}
    {{--    <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <a href="{{route('subject.create')}}"><i class='fas fa-edit'
        style='font-size:36px;'></i>ເພີ່ມຂໍ້ມູນ</a>
    <a href="{{route('subjectreport')}}"><i class='fas fa-chart-pie' style='font-size:36px'></i>ລາຍງານ</a>
</div>
<div class="col-md-4">
    <form action="/searchsubject" method="GET">
        <div class="input-group">
            <input class="form-control" type="search" placeholder="ຄົ້ນຫາຂໍ້ມູນ" name="searchsubject"
                aria-label="Search" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
</div>
</div>
</div> --}}

<div class="card-body">
    <fieldset class="border p-2">
        <legend class="w-auto">ລາຍຊື່ນັກສຶກສາລໍຖ້າຍືນຍັນການລົງທະບຽນ</legend>
        {{--   @if($subjects->count()>0) --}}

        <div class="table-responsive">
            <table class="table " id="dataTable" width="100%" cellspacing="100%">
                <thead>
                    <tr>
                        <th class="text-nowrap">ລະຫັດນັກສຶກສາ</th>
                        <th class="text-nowrap">ເພດ</th>
                        <th class="text-nowrap">ຊື່ນັກສຶກສາ</th>
                        <th class="text-nowrap">ນາມສະກຸນ</th>
                        <th class="text-nowrap">ວັນເດືອນປີເກີດ</th>
                        <th class="text-nowrap">ບ້ານ</th>
                        <th class="text-nowrap">ເມືອງ</th>
                        <th class="text-nowrap">ແຂວງ</th>
                        <th class="text-nowrap">ເບີໂທ</th>
                        <th class="text-nowrap">ສາສະໜາ</th>
                        <th class="text-nowrap">ສາຂາຮຽນ</th>
                        <th class="text-nowrap">ພາກຮຽນ</th>
                        <th class="text-nowrap">ຊື່ພໍ່</th>
                        <th class="text-nowrap">ເບີໂທ</th>
                        <th class="text-nowrap">ຊື່ແມ່</th>
                        <th class="text-nowrap">ເບີໂທ</th>
                        <th class="text-nowrap">ວັນທີລົງທະບຽນ</th>
                        {{--     <th class="text-nowrap">ສະຖານະ</th> --}}
                        {{--     <th class="text-nowrap">ປ່ຽນສະຖານະ</th> --}}



                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td class="text-nowrap">{{$student->st_id}}</td>
                        <td class="text-nowrap">{{$student->st_gender}}</td>
                        <td class="text-nowrap">{{$student->st_name}}</td>
                        <td class="text-nowrap">{{$student->st_surname}}</td>
                        <td class="text-nowrap">{{$student->st_dob}}</td>
                        <td class="text-nowrap">{{$student->st_village}}</td>
                        <td class="text-nowrap">{{$student->st_city}}</td>
                        <td class="text-nowrap">{{$student->st_province}}</td>
                        <td class="text-nowrap">{{$student->st_phone}}</td>
                        <td class="text-nowrap">{{$student->st_religion}}</td>
                        <td class="text-nowrap">{{$student->major->major_name}}</td>
                        <td class="text-nowrap">{{$student->session->session_name}}</td>
                        <td class="text-nowrap">{{$student->father_name}}</td>
                        <td class="text-nowrap">{{$student->father_phone}}</td>
                        <td class="text-nowrap">{{$student->mother_name}}</td>
                        <td class="text-nowrap">{{$student->mother_phone}}</td>
                        <td class="text-nowrap">{{$student->created_at->format('Y/m/d')}}</td>
                        {{--  <td class="text-nowrap">{{$student->status->status_name}}</td> --}}

                        {{--   <td>
                            <form action="{{route('studentregister.edit',$register->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="GET">
                        <button class="btn btn-success" type="submit">
                            ຍືນຍັນ
                        </button>
                        </form>

                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{--
            @else

            <h3 class="text-center">ຍັງບໍມີຂໍ້ມູນໃນຖານຂໍ້ມູນ ຄິກປຸ່ມດ້ານເທິງເພື່ອເພີ່ມຂໍ້ມູນ</h3>

            @endif --}}

        {{--      pagination --}}
        {{--        {{$subjects->appends(['searchsubject'=>request()->get('searchsubject')])->links()}} --}}
        {{--      pagination --}}



</div>
</fieldset>
</div>
</div>
@include('sweetalert::alert')
@endsection
@section('script')
{{-- Alert Delete data --}}
<script type="text/javascript">
    $('.delete-confirm').click(function(event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal({
            title: 'ທ່ານຕ້ອງການທີ່ຈະລົບຂໍ້ມູນແທ້ບໍ?',
            text: "ARE YOU SURE TO DELETE DATA",
            icon: "warning",
           buttons: [
            'ຍົກເລີກ',
            'ຕົກລົງ'
            ],
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
    });
</script>
{{-- End Alert Delete data --}}

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
@stop
