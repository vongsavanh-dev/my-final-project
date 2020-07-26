@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{route('teacher.index')}}"><i class='far fa-arrow-alt-circle-left' style='font-size:40px'></i></a>
        </div>
        <div class="card-body">
            <form action="{{route('teacher.update',$teacher->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <fieldset class="border p-2">
                    <legend class="w-auto">ຟອມແກ້ໄຂຂໍ້ມູນອາຈານ</legend>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="">ຊື່</label>
                            <input type="text" class="form-control" placeholder="ປ້ອນຊື່" name="name"
                                value="{{$teacher->name}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">ນາມສະກຸນ</label>
                            <input type="text" class="form-control" placeholder="ປ້ອນນາມສະກຸນ" name="surname"
                                value="{{$teacher->surname}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">ເພດ</label>
                            <input type="text" class="form-control" placeholder="ປ້ອນເພດ" name="gender"
                                value="{{$teacher->gender}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="">ອີເມວ</label>
                            <input type="text" class="form-control" placeholder="ປ້ອນອີເມວ" name="email"
                                value="{{$teacher->email}}">
                        </div>
                        <div class="form-group col-6">
                            <label for="">ເບີໂທລະສັບ</label>
                            <input type="text" class="form-control" placeholder="ປ້ອນເບີໂທລະສັບ" name="phone"
                                value="{{$teacher->phone}}">
                        </div>
                        <div class="form-group col-4">
                            <label for="">ບ້ານຢູ່ປັດຈຸບັນ</label>
                            <input type="text" class="form-control" placeholder="ປ້ອນເບີໂທລະສັບ" name="village"
                                value="{{$teacher->village}}">
                        </div>

                        <div class="form-group col-4">
                            <label for="province">ແຂວງ</label>
                            <select name="provinces" id="province" class="form-control province">
                                @foreach ($list as $item)
                                <option value="{{$item->pr_name}}">{{$item->pr_name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group col-4">
                            <label for="province">ເມືອງ</label>
                            <select name="district" id="district" class="form-control district">
                                <option value="{{$teacher->district}}"></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ປະຫວັດການສຶກສາ</label>
                                <textarea class="form-control" name="education" rows="3">
                            {{$teacher->education}}
                            </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="from-row">
                        <div class="form-group">
                            <label for="">ເລືອກຮູບພາບ</label>
                            <input type="file" class="form-control-file" name="image" value="{{$teacher->image}}">
                        </div>
                    </div>
                    <div class="from-row">
                        <div class="form-group ">
                            <button type="submit" class="btn btn-success">ອັບເດດ</button>
                            <a href="{{route('teacher.index')}}" class="btn btn-danger">ຍົກເລີກ</a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@stop
@section('script')

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
@stop
