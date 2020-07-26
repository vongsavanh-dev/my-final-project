{{-- @extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <form action="/score/import" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" name='file'>
                <button type="submit" class="btn btn-success">
                    import
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
 --}}


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="/score/import" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" name='file'>
                            <button type="submit" class="btn btn-success">
                                import
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
