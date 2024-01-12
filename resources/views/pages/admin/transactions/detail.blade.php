@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{route('transactions.index')}}" class="btn btn-md btn-primary"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                <div class="invoice p-3 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <img src="{{url('frontend/images/logo 2.png')}}" alt="" width="100px" class="text-center">
                                <small class="float-right">Date: {{ $data->created_at->format('d/m/Y') }}</small>
                            </h4>
                        </div>

                    </div>

                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #{{$data->code}}</b><br>
                            <b>No Tables: {{$data->no_tables}}</b><br>
                            <br>
                            <b>Order ID:</b> {{$data->id}}<br>
                            <b>Payment Due:</b> {{$data->updated_at}}<br>
                            <b>Account:</b> {{ $data->user->name }}
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>SubTotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $item)
                                    <tr class="text-center">
                                        <td>{{ $item->quantity}}</td>
                                        <td>{{ $item->product->name_product }}</td>
                                        <td>Rp.{{number_format($item->product->price) }}</td>
                                        <?php $total = $item->product->price * $item->quantity; ?>
                                        <td>Rp.{{ number_format($total) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-6">
                        </div>

                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr class="text-center">
                                        <th style="width:45%">Total:</th>
                                        <td>Rp.{{number_format($data->total_price)}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection