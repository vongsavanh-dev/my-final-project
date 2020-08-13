@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('classroom.index')}}"><i class='far fa-arrow-alt-circle-left'
                            style='font-size:40px'></i></a>
                </div>

                <div class="card-body">
                    <form action="{{route('classroom.store')}}" method="POST">
                        @csrf
                        <fieldset class="border p-2">
                            <legend class="w-auto">ຟອມເພີ່ມຂໍ້ມູນຫ້ອງຮຽນ</legend>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">ຊື່ຫ້ອງຮຽນ</label>
                                        <input type="text" class="form-control" name="class_name"
                                            placeholder="ປ້ອນຊື່ຫ້ອງຮຽນ">
                                        @if ($errors->has('class_name'))
                                        <hr>
                                        <small class="text-danger">
                                            <h6>{{$errors->first('class_name')}}</h6>
                                        </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-success">ບັນທຶກ</button>
                                <a href="{{route('classroom.index')}}" class="btn btn-danger">ຍົກເລີກ</a>
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
