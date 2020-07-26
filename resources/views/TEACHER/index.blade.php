@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">

        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <a href="{{route('teacher.create')}}"><i class='fas fa-edit'
                            style='font-size:36px'></i>ເພີ່ມຂໍ້ມູນ</a>
                    <a href="{{route('teacherreport')}}"><i class='fas fa-chart-pie'
                            style='font-size:36px'></i>ລາຍງານ</a>
                </div>
                <div class="col-md-4">
                    <form action="/search" method="GET">
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="ຄົ້ນຫາຂໍ້ມູນ" name="search"
                                aria-label="Search" />
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if($teachers->count()>0)
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100%">
                    <thead>
                        <tr>
                            <th class="text-nowrap">ລະຫັດ</th>
                            <th class="text-nowrap">ຮູບພາບ</th>
                            <th class="text-nowrap">ຊື່</th>
                            <th class="text-nowrap">ນາມສະກຸນ</th>
                            <th class="text-nowrap">ເພດ</th>
                            <th class="text-nowrap">ອີເມວ</th>
                            <th class="text-nowrap">ເບີໂທ</th>
                            <th class="text-nowrap">ບ້ານ</th>
                            <th class="text-nowrap">ເມືອງ</th>
                            <th class="text-nowrap">ແຂວງ</th>
                            <th class="text-nowrap">ປະຫວັດການສຶກສາ</th>
                            <th class="text-nowrap">ແກ້ໄຂ</th>
                            <th class="text-nowrap">ລຶບ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                        <tr>
                            <td class="text-nowrap">{{$teacher->t_id}}</td>
                            <td>
                                <img src="storage/{{$teacher->image}}" alt="" width="90px" height="90px">
                            </td>
                            <td class="text-nowrap">{{$teacher->name}}</td>
                            <td class="text-nowrap">{{$teacher->surname}}</td>
                            <td class="text-nowrap">{{$teacher->gender}}</td>
                            <td class="text-nowrap">{{$teacher->email}}</td>
                            <td class="text-nowrap">{{$teacher->phone}}</td>
                            <td class="text-nowrap">{{$teacher->village}}</td>
                            <td class="text-nowrap">{{$teacher->district}}</td>
                            <td class="text-nowrap">{{$teacher->province}}</td>
                            <td class="text-nowrap">{{$teacher->education}}</td>
                            <td>
                                <a href="{{route('teacher.edit',$teacher->id)}}">
                                    <i class='fas fa-tools' style='font-size:30px;color:rgb(17, 0, 255);'></i>ແກ້ໄຂ</a>

                            </td>
                            <td>
                                <form class="delete-confirm" action="{{route('teacher.destroy',$teacher->id)}}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'
                                            style='font-size:22px'></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
        {{$teachers->appends(['search'=>request()->get('search')])->links()}}
    </div>
</div>


@else
<h3 class="text-center">ຍັງບໍມີຂໍ້ມູນໃນຖານຂໍ້ມູນ ຄິກປຸ່ມດ້ານເທິງເພື່ອເພີ່ມຂໍ້ມູນ</h3>
@endif
{{--      pagination --}}

{{--      pagination --}}
</div>
</div>
</div>


@include('sweetalert::alert')
@endsection
@section('script')
{{-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script> --}}



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
