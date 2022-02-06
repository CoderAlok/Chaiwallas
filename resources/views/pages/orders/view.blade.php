@extends('layout.under_dashboard')

@section('main-container')

    <div class="page-header">
        <div class="page-header-title">
            <h4>Order details</h4>
        </div>
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="index-2.html">
                        <i class="icofont icofont-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Order details</a>
                </li>
                <li class="breadcrumb-item"><a href="#!">View Order details</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Page header end -->
    <!-- Page body start -->
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- Basic Form Inputs card start -->
                <div class="card">
                    <div class="card-header">
                        <h5>View Order details</h5>
                        <div class="card-header-right">
                            <i class="icofont icofont-rounded-down"></i>
                            <i class="icofont icofont-refresh"></i>
                            <i class="icofont icofont-close-circled"></i>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="col-sm-8">
                            <div class="validation_errors_alert">
                                {{-- error message will pop up --}}
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Order ID : </label>
                                <label class="col-sm-9 col-form-label">{{ $order_id[0]->order_id }}</label>
                                <h1 class="col-sm-12 col-form-label font-weight-bold">{{ $shop_dets[0]->name }}</h1>
                                <h4 class="col-sm-12 col-form-label">{{ $shop_dets[0]->address }}</h4>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="table-responsive dt-responsive">
                                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            {{-- <th>Order ID</th> --}}
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Unit</th>
                                            <th>Rate</th>
                                            <th>Total</th>
                                            <th>Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $key => $user)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            {{-- <td>{{ $user->order_id }}</td> --}}
                                            <td>{{ $user->product_id }}</td>
                                            <td>{{ $user->quantity }}</td>
                                            <td>{{ $user->unit }}</td>
                                            <td>{{ $user->unit_price_id }}</td>
                                            <td>{{ $user->total_price }}</td>
                                            <td>{{ $user->notes }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic Form Inputs card end -->

        <script>
            function visibility3() {
                var x = document.getElementById('login_password');
                if (x.type === 'password') {
                    x.type = "text";
                    $('#eyeShow').show();
                    $('#eyeSlash').hide();
                }else {
                    x.type = "password";
                    $('#eyeShow').hide();
                    $('#eyeSlash').show();
                }
            }
        </script>
@endsection
