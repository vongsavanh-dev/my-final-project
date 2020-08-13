@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('subject.index')}}"><i class='far fa-arrow-alt-circle-left'
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
                    <form action="{{route('subject.update',$subjects->id)}}" method="POST">
                        @csrf
                        {{method_field('PUT')}}
                        <fieldset class="border p-2">
                            <legend class="w-auto">ຟອມແກ້ໄຂຂໍ້ມູນວິຊາຮຽນ</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">ສາຂາຮຽນ</label>
                                        <select name="major_id" class="form-control">
                                            @foreach ($majors as $major)
                                            <option value="{{$major->id}}" @if(isset($subjects)) @if($major->id ==
                                                $subjects->major_id)
                                                selected
                                                @endif
                                                @endif
                                                >{{$major->major_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">ຊື່ວິຊາ</label>
                                        <input type="text" class="form-control" name="sub_name" id="sub_name"
                                            value="{{$subjects->sub_name}}" placeholder="ປ້ອນຊື່ວິຊາ">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="fom-control">
                                        <label for="">ຈຳນວນໜ່ວຍກິດ</label>
                                        <input type="text" class="form-control" name="credit"
                                            value="{{$subjects->credit}}" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">ລາຄາລວມໜ່ວຍກິດ</label>
                                        <input type="text" class="form-control" name="total_price"
                                            value="{{$subjects->total_price}}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">ປີຮຽນ</label>
                                        <input type="text" class="form-control" name="year_name"
                                            value="{{$subjects->year_name}}">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-success">ອັບເດດ</button>
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
