@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Product</h3>
                <div class="card-tools">
                    <a href="{{route('product.create')}}" class="btn btn-md btn-primary shadow"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Categories</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item )
                            <tr class="text-center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->name_product}}</td>
                                <td>{{$item->category->name}}</td>
                                <td>Rp. {{number_format($item->price)}}</td>
                                <td><img src="{{Storage::url($item->image)}}" alt="" class="rounded shadow" width="100px"></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('product.edit', $item->id)}}" class="btn btn-md btn-warning"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                        <form action="{{route('product.destroy', $item->id)}}" method="post">
                                            @csrf
                                            @method('Delete')
                                            <button type="submit" class="btn btn-md btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty

                            <tr class="text-center">
                                <td colspan="6">Data Not Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Modal Add -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Categories</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('categories.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name Categories">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>



@endsection


@push('addon-styles')
<link href="{{url('ruang-admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush


@push('addon-script')
<script src="{{url('ruang-admin/vendor/jquery/jquery.min.js')}}"></script>
<!-- Page level plugins -->
<script src="{{url('ruang-admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('ruang-admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable 
    });
</script>
@endpush