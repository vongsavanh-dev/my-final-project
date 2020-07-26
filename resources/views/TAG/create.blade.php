@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('tag.index')}}"><i class='far fa-arrow-alt-circle-left'
                            style='font-size:40px'></i></a>
                </div>

                <div class="card-body">
                    <form action="{{route('tag.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">ຊື່ແຈ້ງການທີກ່ຽວຂ້ອງ</label>
                                    <input type="text" class="form-control" name="name">
                                    @if ($errors->has('name'))
                                    <hr>
                                    <small class="text-danger">
                                        <h6>{{$errors->first('name')}}</h6>
                                    </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="submit" class="btn btn-success">ບັນທຶກ</button>
                            <a href="{{route('tag.index')}}" class="btn btn-danger">ຍົກເລີກ</a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
