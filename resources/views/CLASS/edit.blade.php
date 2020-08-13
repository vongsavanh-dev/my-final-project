@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('classroom.index')}}"><i class='far fa-arrow-alt-circle-left'
                            style='font-size:40px'></i></a>
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                            <li class="list-group-item">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{route('classroom.update',$classroom->id)}}" method="POST">
                        @csrf
                        {{method_field('PUT')}}
                        <fieldset class="border p-2">
                            <legend class="w-auto">ຟອມແກ້ໄຂຂໍ້ມູນວິຊາຮຽນ</legend>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">ຊື່ຫ້ອງຮຽນ</label>
                                        <input type="text" class="form-control" name="class_name"
                                            value="{{$classroom->class_name}}" placeholder="ປ້ອນຊື່ຫ້ອງ">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-success">ອັບເດດ</button>
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
