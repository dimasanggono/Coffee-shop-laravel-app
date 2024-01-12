@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Categories</h3>
                <a href="{{route('categories.index')}}" class="btn btn-md btn-primary shadow"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
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
                <form action="{{route('categories.update', $category->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name Product</label>
                        <input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="Enter Name Categories">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection