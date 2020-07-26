@extends('layouts.master')


@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{route('teacher.index')}}"><i class='far fa-arrow-alt-circle-left' style='font-size:40px'></i></a>
        </div>
        <div class="card-body">
            <form action="{{route('teacher.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset class="border p-2">
                    <legend class="w-auto">ຟອມບັນທຶກຂໍ້ມູນອາຈານ</legend>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="">ຊື່</label>
                            <input type="text" class="form-control" placeholder="ປ້ອນຊື່" name="name">
                            @if ($errors->has('name'))
                            <small class="text-danger">
                                <h6>{{$errors->first('name')}}</h6>
                            </small>
                            @endif
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">ນາມສະກຸນ</label>
                            <input type="text" class="form-control" placeholder="ປ້ອນນາມສະກຸນ" name="surname">

                            @if ($errors->has('surname'))
                            <small class="text-danger">
                                <h6>{{$errors->first('surname')}}</h6>
                            </small>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">ເພດ</label>
                            <input type="text" class="form-control" placeholder="ປ້ອນເພດ" name="gender">
                            @if ($errors->has('gender'))
                            <small class="text-danger">
                                <h6>{{$errors->first('gender')}}</h6>
                            </small>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="">ອີເມວ</label>
                            <input type="text" class="form-control" placeholder="ປ້ອນອີເມວ" name="email">
                            @if ($errors->has('email'))
                            <small class="text-danger">
                                <h6>{{$errors->first('email')}}</h6>
                            </small>
                            @endif
                        </div>
                        <div class="form-group col-6">
                            <label for="">ເບີໂທລະສັບ</label>
                            <input type="text" class="form-control" placeholder="ປ້ອນເບີໂທລະສັບ" name="phone">
                            @if ($errors->has('phone'))
                            <small class="text-danger">
                                <h6>{{$errors->first('phone')}}</h6>
                            </small>
                            @endif
                        </div>
                        <div class="form-group col-4">
                            <label for="">ບ້ານຢູ່ປັດຈະບັນ</label>
                            <input type="text" class="form-control" placeholder="ບ້ານຢູ່ປັດຈຸບັນ" name="village">
                            @if ($errors->has('village'))
                            <small class="text-danger">
                                <h6>{{$errors->first('village')}}</h6>
                            </small>
                            @endif
                        </div>

                        <div class="form-group col-4">
                            <label for="province">ແຂວງ</label>

                            <select name="provinces" id="province" class="form-control province">
                                <option value="">ເລືອກແຂວງ</option>
                                @foreach ($list as $item)
                                <option value="{{$item->pr_name}}">{{$item->pr_name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('provinces'))
                            <small class="text-danger">
                                <h6>{{$errors->first('provinces')}}</h6>
                            </small>
                            @endif
                        </div>
                        <div class="form-group col-4">
                            <label for="province">ເມືອງ</label>
                            <select name="district" id="district" class="form-control district">
                                <option value=""></option>
                            </select>
                            @if ($errors->has('district'))
                            <small class="text-danger">
                                <h6>{{$errors->first('district')}}</h6>
                            </small>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ປະຫວັດການສຶກສາ</label>
                                <textarea class="form-control" name="education" rows="3"></textarea>
                                @if ($errors->has('education'))
                                <small class="text-danger">
                                    <h6>{{$errors->first('education')}}</h6>
                                </small>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="from-row">
                        <div class="form-group">
                            <label for="">ເລືອກຮູບພາບ</label>
                            <input type="file" class="form-control-file" name="image">
                            @if ($errors->has('image'))
                            <small class="text-danger">
                                <h6>{{$errors->first('image')}}</h6>
                            </small>
                            @endif
                        </div>
                    </div>
                    <div class="from-row">
                        <div class="form-group ">
                            <button type="submit" class="btn btn-success">ບັນທຶກ</button>
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
