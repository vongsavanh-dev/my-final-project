@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error->sub_name }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <a href="{{route('subject.create')}}"><i class='fas fa-edit'
                            style='font-size:36px;'></i>ເພີ່ມຂໍ້ມູນ</a>
                    <a href="{{route('subjectreport')}}"><i class='fas fa-chart-pie'
                            style='font-size:36px'></i>ລາຍງານ</a>
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
        </div>
        <div class="card-body">
            @if($subjects->count()>0)
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100%">
                    <thead>
                        <tr>
                            <th scope="col">ລະຫັດວິຊາ</th>
                            <th scope="col">ຊື່ວິຊາ</th>
                            <th scope="col">ຈຳນວນໜ່ວຍກິດ</th>
                            <th scope="col">ຊື່ສາຂາ</th>
                            <th scope="col">ແກ້ໄຂ</th>
                            <th scope="col">ລຶບ</th>

                    <tbody>
                        @foreach ($subjects as $subject)
                        <tr>
                            <td>{{$subject->sub_id}}</td>
                            <td>{{$subject->sub_name}}</td>
                            <td>{{$subject->credit}}</td>
                            <td>{{$subject->major->major_name}}</td>
                            <td>
                                <a href="{{route('subject.edit',$subject->id)}}">
                                    <i class='fas fa-tools'
                                        style='font-size:30px;color:rgb(17, 0, 255);'></i>ແກ້ໄຂ</a></a>
                            </td>
                            <td>
                                <form class="delete-confirm" action="{{route('subject.destroy',$subject->id)}}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'
                                            style='font-size:22px'></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @else

            <h3 class="text-center">ຍັງບໍມີຂໍ້ມູນໃນຖານຂໍ້ມູນ ຄິກປຸ່ມດ້ານເທິງເພື່ອເພີ່ມຂໍ້ມູນ</h3>

            @endif

            {{--      pagination --}}
            {{$subjects->appends(['searchsubject'=>request()->get('searchsubject')])->links()}}
            {{--      pagination --}}
        </div>
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
