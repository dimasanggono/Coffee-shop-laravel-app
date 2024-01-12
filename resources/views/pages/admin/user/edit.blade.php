@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit user</h3>
                <div class="card-tools">
                    <a href="{{route('user.index')}}" class="btn btn-md btn-primary shadow"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                </div>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card-body">
                <form action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name user</label>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Enter Name user">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="no_tlp">Phone Number</label>
                        <input type="no_tlp" class="form-control" name="no_tlp" value="{{$user->no_tlp}}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" value="{{$user->password}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection


@push('addon-styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush


@push('addon-script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
@endpush