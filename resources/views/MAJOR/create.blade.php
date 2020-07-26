@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('major.index')}}"><i class='far fa-arrow-alt-circle-left'
                            style='font-size:40px'></i></a>
                </div>

                <div class="card-body">
                    <form action="{{route('major.store')}}" method="POST">
                        @csrf
                        <fieldset class="border p-2">
                            <legend class="w-auto">ຟອມເພີ່ມຂໍ້ມູນສາຂາຮຽນ</legend>
                            <div class="row">
                                {{--  <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">ລະຫັດສາຂາ</label>
                                    <input type="text" class="form-control" name="m_code" placeholder="ປ້ອນລະຊື່ສາຂາ">
                                         @if ($errors->has('sub_code'))
                                    <hr>
                                    <small class="text-danger">
                                        <h6>{{$errors->first('sub_code')}}</h6>
                                </small>
                                @endif
                            </div>
                </div> --}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">ຊື່ສາຂາ</label>
                        <input type="text" class="form-control" name="major_name" placeholder="ປ້ອນຊື່ສາຂາ">
                        @if ($errors->has('major_name'))
                        <hr>
                        <small class="text-danger">
                            <h6>{{$errors->first('major_name')}}</h6>
                        </small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" id="submit" class="btn btn-success">ບັນທຶກ</button>
                <a href="{{route('subject.index')}}" class="btn btn-danger">ຍົກເລີກ</a>
            </div>
            </fieldset>
            </form>
        </div>

    </div>
</div>
</div>
</div>
@endsection
@section('scripts')

@endsection
