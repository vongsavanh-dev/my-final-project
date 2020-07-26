@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('year.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{route('year.update',$years->id)}}" method="POST">
                        @csrf
                        {{method_field('PUT')}}
                        <fieldset class="border p-2">
                            <legend class="w-auto">ຟອມແກ້ໄຂຂໍ້ມູນປີຮຽນ</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="fom-control">
                                        <label for="">ຊື່ປີຮຽນ</label>
                                        <input type="text" class="form-control" name="year_name"
                                            value="{{$years->year_name}}">
                                        @if ($errors->has('year_name'))
                                        <hr>
                                        <small class="text-danger">
                                            <h6>{{$errors->first('year_name')}}</h6>
                                        </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-success">ອັບເດດ</button>
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
