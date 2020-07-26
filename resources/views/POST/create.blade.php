@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('post.index')}}"><i class='far fa-arrow-alt-circle-left'
                            style='font-size:40px'></i></a>
                </div>

                <div class="card-body">
                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="border p-2">
                            <legend class="w-auto">ຟອມເພີ່ມຂໍ້ມູນແຈ້ງການ</legend>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">ຫົວຂໍ້</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">ຄຳອະທິບາຍ</label>
                                        <textarea name="description" id="" cols="4" rows="4"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">ເນື້ອຫາ</label>
                                        <input id="x" type="hidden" name="content" class="form-control">
                                        <trix-editor input="x"></trix-editor>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">ຮູບພາບ</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">ເລືອກປະເພດແຈ້ງການ</label>
                                        <select name="category" class="form-control">
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @if($tags->count()>0)
                                    <div class="form-group">
                                        <label for="category">ເລືອກTag</label>
                                        <select name="tags[]" class="form-control" id="select-tags" multiple="multiple">
                                            @foreach ($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-success">ບັນທຶກ</button>
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
    $('#select-tags').select2();
    });
</script>
@endsection
