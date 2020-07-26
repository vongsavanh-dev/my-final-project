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
    <div class="card-header">
        {{--   <a href="{{route('user.create')}}" class="btn btn-info">ເພີ່ມຂໍ້ມູນ</a> --}}
    </div>
    <div class="card-body">
        {{-- @if($subjects->count()>0) --}}
        <div class="table-responsive">
            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr style="background-color:#2980b9;color:#ffff;">
                        <th scope="col">ລຳດັບ</th>
                        <th scope="col">ຊື່ຜູ້ໃຊ້</th>
                        <th scope="col">ອີເມວ</th>
                        <th scope="col" class="text-nowrap">ສະຖານະ</th>
                        <th scope="col" class="text-nowrap">ປ່ຽນສະຖານະ</th>
                        {{--      <th scope="col">ລຶບ</th> --}}
                    </tr>
                <tbody>
                    @foreach ($users as $user)


                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td class="text-nowrap">{{$user->status}}</td>

                        @if(!$user->IsAdmin())
                        <td class="text-nowrap">
                            <form action="{{route('users.MakeAdmin',$user->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm">
                                    MakeAdmin
                                </button>
                            </form>
                        </td>

                        @endif
                        {{--
                        <td>
                            <form class="delete-confirm" action="" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" type="submit">ລຶບ</button>
                            </form>

                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{--  @else

            <h3 class="text-center">ຍັງບໍມີຂໍ້ມູນໃນຖານຂໍ້ມູນ ຄິກປຸ່ມດ້ານເທິງເພື່ອເພີ່ມຂໍ້ມູນ</h3>

            @endif --}}
    </div>
</div>
</div>
@include('sweetalert::alert')
@stop


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
