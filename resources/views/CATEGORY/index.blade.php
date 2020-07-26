@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error->name }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-header">
            @if(Session()->has('error'))
            <div class="alert alert-danger">
                <ul>
                    {{session()->get('error')}}
                </ul>
            </div>
            @endif

            <div class="row">
                <div class="col-md-8">
                    <a href="{{route('category.create')}}"><i class='fas fa-edit'
                            style='font-size:36px'></i>ເພີ່ມຂໍ້ມູນ</a>

                    {{--   <a href="{{route('subjectreport')}}" class="btn btn-warning">ລາຍງານPDF</a> --}}
                </div>
                <div class="col-md-4">
                    <form action="/searchcategory" method="GET">
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="ຄົ້ນຫາຂໍ້ມູນ" name="searchcategory"
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
            @if($categorys->count()>0)
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="100%">
                    <thead>
                        <tr>
                            <th scope="col">ລຳດັບ</th>
                            <th scope="col">ຊື່ປະເພດແຈ້ງການ</th>
                            <th scope="col">ຈຳນວນແຈ້ງການ</th>
                            <th scope="col">ແກ້ໄຂ</th>
                            <th scope="col">ລຶບ</th>

                    <tbody>
                        @foreach ($categorys as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->post->count()}}</td>
                            <td>
                                <a href="{{route('category.edit',$category->id)}}"><i class='fas fa-tools'
                                        style='font-size:30px;color:rgb(17, 0, 255);'></i>ແກ້ໄຂ</a></a>
                            </td>
                            <td>
                                <form class="delete-confirm" action="{{route('category.destroy',$category->id)}}"
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

            @else

            <h3 class="text-center">ຍັງບໍມີຂໍ້ມູນໃນຖານຂໍ້ມູນ ຄິກປຸ່ມດ້ານເທິງເພື່ອເພີ່ມຂໍ້ມູນ</h3>

            @endif

            {{--      pagination --}}
            {{$categorys->appends(['searchcategory'=>request()->get('searchcategory')])->links()}}
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
