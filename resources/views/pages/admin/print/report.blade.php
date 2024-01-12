<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Center Content</title>

    <link rel="stylesheet" href="{{url('template/plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{url('template/dist/css/adminlte.min.css?v=3.2.0')}}">
</head>

<body>
    <center>
        <section class="invoice">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice p-3 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <img src="{{url('frontend/images/logo 2.png')}}" alt="" width="200px" class="text-center"> <br>
                                        <small class="float-right p-2">{{$date}}</small>
                                    </h4>
                                </div>

                            </div>

                            <div class="row invoice-info">
                                <div class="col-sm-12 invoice-col">
                                    <h3 class="text-center text-bold">Report Daily</h3>
                                </div>

                            </div>


                            <div class="row mt-4">
                                <div class="col-12 table-responsive">
                                    <table class="table  table-border table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Date</th>
                                                <th>Daily Income</th>
                                                <th>Daily Sales</th>
                                                <th>Earnings(Monthly)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-center">
                                                <td>{{ $date}}</td>
                                                <td> Rp.{{number_format( $day )}}</td>
                                                <td>{{$sales}}</td>
                                                <td>Rp.{{number_format($revenue)}}</td>
                                            </tr>
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
                                                <td>Rp.{{number_format($day)}}</td>
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
    </center>

    <script data-cfasync="false" src="{{url('template/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>


<!-- @php dd($data); dd($transactions); @endphp -->