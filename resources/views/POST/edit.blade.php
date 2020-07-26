@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('post.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
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
                    <form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <fieldset class="border p-2">
                            <legend class="w-auto">ຟອມແກ້ໄຂຂໍ້ມູນແຈ້ງການ</legend>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">ຫົວຂໍ້</label>
                                        <input type="text" name="title" class="form-control" value="{{$post->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">ຄຳອະທິບາຍ</label>
                                        <textarea name="description" id="" cols="4" rows="4"
                                            class="form-control">{{$post->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">ເນື້ອຫາ</label>
                                        <input id="x" type="hidden" name="content" class="form-control"
                                            value="{{$post->content}}">
                                        <trix-editor input="x"></trix-editor>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">ຮູບພາບ</label>
                                        <input type="file" name="image" class="form-control" value="{{$post->image}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">ເລືອກປະເພດແຈ້ງການ</label>
                                        <select name="category" class="form-control">
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}" @if(isset($post)) @if($category->id ==
                                                $post->category_id)
                                                selected
                                                @endif
                                                @endif
                                                >{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">ເລືອກTag</label>
                                        <select name="tags[]" class="form-control" id="edit-tags" multiple="multiple">
                                            @foreach ($tags as $tag)
                                            <option value="{{$tag->id}}" @if(isset($post)) @if($post->hasTag($tag->id))
                                                selected
                                                @endif
                                                @endif>{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-success">ອັບເດດ</button>
                                <a href="{{route('post.index')}}" class="btn btn-danger">ຍົກເລີກ</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
    $('#edit-tags').select2();
    });
</script>
@endsection
