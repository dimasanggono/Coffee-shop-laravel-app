@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</div>

<div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Earnings (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{number_format($revenue)}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill-wave fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Daily Sales</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sales}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New User Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                            Daily Income</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp. {{number_format($day)}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">All Product</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$product}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-boxes fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Row-->
<div class="row mb-2">
    <div class="col-2">
        <a href="{{route('report.pdf')}}" class="btn btn-success px-4" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Download Report</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Order List</h3>
                <hr>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>No Tables</th>
                                <th>Total Price</th>
                                <th>Status Payment</th>
                                <th>Order Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item )
                            <?php $no = 1; ?>
                            <tr class="text-center">
                                <td>{{$no++}}</td>
                                <td>{{$item->code}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>No. 0{{$item->no_tables}}</td>
                                <td>Rp.{{number_format($item->total_price)}}</td>
                                <td> @if($item->status == 'PENDING')
                                    <span class="badge bg-warning text-white">{{$item->status}}</span>
                                    @elseif ($item->status == 'SUCCESS')
                                    <span class="badge bg-success text-white">{{$item->status}}</span>
                                    @else
                                    <span class="badge bg-danger text-white">{{$item->status}}</span>
                                    @endif
                                </td>
                                <td>{{($item->created_at)}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('transactions.show', $item->id)}}" class="btn btn-md btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="{{route('generate.pdf', $item->id)}}" class="btn btn-md btn-success" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>

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