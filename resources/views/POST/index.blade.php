@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <a href="{{route('post.create')}}"><i class='fas fa-edit' style='font-size:36px'></i>ເພີ່ມຂໍ້ມູນ</a>
                    {{-- <a href="{{route('teacherreport')}}" class="btn btn-warning">ລາຍງານPDF</a> --}}
                </div>
                {{--  <div class="col-md-4">
                    <form action="/search" method="GET">
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="ຄົ້ນຫາຂໍ້ມູນ" name="search"
                                aria-label="Search" />
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
        <div class="card-body">
            @if($posts->count()>0)
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">ລຳດັບ</th>
                            <th scope="col">ຮູບພາບ</th>
                            <th scope="col" class="text-nowrap">ຫົວຂໍ້</th>
                            <th scope="col">ປະເພດແຈ້ງການ</th>
                            <th scope="col">ຄຳອະທິບາຍ</th>
                            <th scope="col">ບັນທຶກ</th>
                            <th scope="col">ລຶບ</th>


                        </tr>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>
                                <img src="storage/{{$post->image}}" alt="" width="90px" height="90px">
                            </td>
                            <td class="text-nowrap">{{$post->title}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>{{$post->description}}</td>
                            <td>
                                <a href="{{route('post.edit',$post->id)}}"><i class='fas fa-tools'
                                        style='font-size:30px;color:rgb(17, 0, 255);'></i>ແກ້ໄຂ</a></a>
                            </td>
                            <td>
                                <form class="delete-confirm" action="{{route('post.destroy',$post->id)}}" method="POST">
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
            {{--    {{$teachers->appends(['search'=>request()->get('search')])->links()}} --}}
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

{{-- End Alert Delete data --}}
@stop
