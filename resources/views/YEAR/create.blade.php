@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('year.index')}}"><i class='far fa-arrow-alt-circle-left'
                            style='font-size:40px'></i></a>
                </div>
                <div class="card-body">
                    <form action="{{route('year.store')}}" method="POST">
                        @csrf
                        <fieldset class="border p-2">
                            <legend class="w-auto">ຟອມເພີ່ມຂໍ້ມູນປີຮຽນ</legend>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">ຊື່ປີຮຽນ</label>
                                        <input type="text" class="form-control" name="year_name"
                                            placeholder="ປ້ອນຊື່ປີຮຽນ">
                                        @if ($errors->has('year_name'))
                                        <hr>
                                        <small class="text-danger">
                                            <h6>{{$errors->first('year_name')}}</h6>
                                        </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-success">ບັນທຶກ</button>
                                <a href="{{route('year.index')}}" class="btn btn-danger">ຍົກເລີກ</a>
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
