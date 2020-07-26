@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('tag.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
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
                    <form action="{{route('tag.update',$tags->id)}}" method="POST">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">tagname</label>
                                    <input type="text" class="form-control" name="name" value="{{$tags->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="submit" class="btn btn-success">ອັບເດດ</button>
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
