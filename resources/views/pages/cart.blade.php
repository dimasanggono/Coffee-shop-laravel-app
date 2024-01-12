@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>
    </div>


    <section class="list-cart">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Image</th>
                                            <th>Name Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cart as $item )
                                        <tr class="text-center" id="item1">
                                            <td><img src="{{Storage::url($item->product->image)}}" alt="" class="rounded" width="80px"></td>
                                            <td>{{$item->product->name_product}}</td>
                                            <td>Rp.{{number_format($item->product->price)}}</td>
                                            <td>
                                                <span>{{$item->quantity}}</span>
                                            </td>
                                            <?php $total = $item->product->price * $item->quantity; ?>
                                            <td class="text-danger fw-bold">Rp.<span>{{number_format($total)}}</span></td>
                                            <td>
                                                <form action="{{route('cart.delete', $item->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm">X</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Your don't have a item in Cart!</td>
                                        </tr>
                                        @endforelse
                                    </tbody>

                                    <?php
                                    // Calculate the total price for all items in the cart
                                    $total_price = $cart->sum(function ($item) {
                                        return $item->product->price * $item->quantity;
                                    });
                                    ?>
                                    <tfoot>
                                        <tr class="text-center">
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Total:</th>
                                            <td class="text-danger fw-bold">Rp.<span>{{number_format($total_price)}}</span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-3">
                    <div class="card">
                        <div class="card-title mt-2">
                            <h4 class="text-center">Form Customer</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('checkout')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="total_price" value="{{ $total_price }}">
                                <!-- <div class="mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Your Name..">
                                </div> -->
                                <div class="mb-3">
                                    <label for="">Table</label>
                                    <input type="number" name="no_tables" class="form-control" placeholder="0" required>
                                </div>
                                <div class="mb-3 text-center">
                                    @if ($cart->isEmpty())
                                    <button class="btn btn-success disabled" disabled>Payment</button>
                                    @else
                                    <button type="submit" class="btn btn-success">Payment</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection