@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('session.index')}}">
                        <i class='far fa-arrow-alt-circle-left' style='font-size:40px'></i>
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{route('session.update',$sessions->id)}}" method="POST">
                        @csrf
                        {{method_field('PUT')}}
                        <fieldset class="border p-2">
                            <legend class="w-auto">ຟອມແກ້ໄຂຂໍ້ມູນພາກຮຽນ</legend>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">ຊື່ພາກຮຽນ</label>
                                        <input type="text" class="form-control" name="session_name"
                                            value="{{$sessions->session_name}}" placeholder="ປ້ອນຊື່ພາກຮຽນ">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-success">ອັບເດດ</button>
                                <a href="{{route('session.index')}}" class="btn btn-danger">ຍົກເລີກ</a>
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
