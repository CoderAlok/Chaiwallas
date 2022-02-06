@extends('layout.under_dashboard')

@section('main-container')

    <div class="page-header">
        <div class="page-header-title">
            <h4>Products</h4>
        </div>
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="index-2.html">
                        <i class="icofont icofont-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Products</a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Update Products</a>
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
                        <h5>Add Products</h5>
                        <div class="card-header-right">
                            <i class="icofont icofont-rounded-down"></i>
                            <i class="icofont icofont-refresh"></i>
                            <i class="icofont icofont-close-circled"></i>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="col-sm-8">
                            <div class="validation_errors_alert text-{{ $errors->first('status')=="danger"?'danger':'success' }}">
                                {{ $errors->first('error_msg') }}
                            </div>
                        </div>
                    </div>
                        <div class="col-sm-8">

                        <form action="{{ url('/') }}/dashboard/shop/update" method="post">
                        @csrf
                            <input type="hidden" name="id" id="id" value="{{ $shop_data->id }}">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter product name" value="{{ $shop_data->name }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea name="address" id="address" class="form-control" placeholder="Enter shop address" rows="5" cols="10" value="{{ $shop_data->address }}">{{ $shop_data->address }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Country</label>
                                <div class="col-sm-10">
                                    <select name="country" id="country" class="form-control">
                                        @foreach ($country as $val)
                                        <option value="{{ $val->id }}" {{ $val->id == $shop_data->country?'selected':'' }}>{{ $val->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">State</label>
                                <div class="col-sm-10">
                                    <select name="state" id="state" class="form-control">
                                        @foreach ($state as $val)
                                        <option value="{{ $val->id }}" {{ $val->id == $shop_data->state?'selected':'' }}>{{ $val->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-10">
                                    <select name="city" id="city" class="form-control">
                                        @foreach ($city as $val)
                                        <option value="{{ $val->id }}" {{ $val->id == $shop_data->city?'selected':'' }}>{{ $val->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pincode</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pincode" id="pincode" class="form-control" placeholder="Enter shop pincode" value=" {{ $shop_data->pincode }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-primary">Update Shop</button>
                                </div>
                            </div>
                            <textarea id="description" style="visibility: hidden;"></textarea>

                        </form>
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
