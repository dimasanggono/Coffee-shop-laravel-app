@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Data Transactions</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item )
                            <tr class="text-center">
                                <td>{{$item->id}}</td>
                                <td>{{$item->code}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>Rp.{{number_format($item->total_price)}}</td>
                                <td> @if($item->status == 'PENDING')
                                    <span class="badge bg-warning text-white">{{$item->status}}</span>
                                    @elseif ($item->status == 'SUCCESS')
                                    <span class="badge bg-success text-white">{{$item->status}}</span>
                                    @else
                                    <span class="badge bg-danger text-white">{{$item->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('transactions.show', $item->id)}}" class="btn btn-md btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="{{route('generate.pdf', $item->id)}}" class="btn btn-md btn-success" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>
                                        <form action="{{route('transactions.destroy', $item->id)}}" method="post">
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