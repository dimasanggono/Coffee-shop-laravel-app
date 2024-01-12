@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Product</h3>
                <div class="card-tools">
                    <a href="{{route('product.index')}}" class="btn btn-md btn-primary shadow"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
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
                <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name Product</label>
                        <input type="text" class="form-control" name="name_product" value="{{$product->name_product}}" placeholder="Enter Name Product" required>
                    </div>
                    <div class="form-group">
                        <label for="id_categories">Categories</label>
                        <select name="id_categories" class="form-control" required>
                            <option value="{{$product->id_categories}}">{{$product->category->name}}</option>
                            @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" value="{{$product->price}}" placeholder="0" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="summernote" value="{{$product->description}}" class="form-control" cols="50" rows="50">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" value="{{old($product->image)}}">
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