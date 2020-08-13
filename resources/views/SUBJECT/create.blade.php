@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('subject.index')}}"><i class='far fa-arrow-alt-circle-left'
                            style='font-size:40px'></i></a>
                </div>

                <div class="card-body">
                    <form action="{{route('subject.store')}}" method="POST">
                        @csrf
                        <fieldset class="border p-2">
                            <legend class="w-auto">ຟອມເພີ່ມຂໍ້ມູນວິຊາຮຽນ</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">ເລືອກສາຂາຮຽນ</label>
                                    <select class="form-control" name="major_id">
                                        @foreach ($majors as $major)
                                        <option value="{{$major->id}}">{{$major->major_name}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    @if ($errors->has('major_id'))
                                    <small class="text-danger">
                                        <h6>{{$errors->first('major_id')}}</h6>
                                    </small>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">ຊື່ວິຊາ</label>
                                        <input type="text" class="form-control" name="sub_name" id="sub_name"
                                            placeholder="ປ້ອນຊື່ວິຊາ">
                                        @if ($errors->has('sub_name'))
                                        <hr>
                                        <small class="text-danger">
                                            <h6>{{$errors->first('sub_name')}}</h6>
                                        </small>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">ຈຳນວນໜ່ວຍກິດ</label>
                                        <input type="text" class="form-control" name="credit"
                                            placeholder="ປ້ອນຈຳນວນໜ່ວຍກິດ">
                                        @if ($errors->has('credit'))
                                        <hr>
                                        <small class="text-danger">
                                            <h6>{{$errors->first('credit')}}</h6>
                                        </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">ລາຄາລວມໜ່ວຍກິດ</label>
                                        <input type="text" class="form-control" name="total_price"
                                            placeholder="ປ້ອນຈຳນວນລາຄາ">
                                        @if ($errors->has('total_price'))
                                        <hr>
                                        <small class="text-danger">
                                            <h6>{{$errors->first('total_price')}}</h6>
                                        </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">ປີຮຽນ</label>
                                        <select class="form-control" name="year_name">
                                            <option value="ປີ1">ປີ1</option>
                                            <option value="ປີ2">ປີ2</option>
                                            <option value="ປີ3">ປີ3</option>
                                        </select>
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
