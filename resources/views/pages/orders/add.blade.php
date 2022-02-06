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
                <li class="breadcrumb-item"><a href="#!">Add Products</a>
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
                            <div class="validation_errors_alert">
                                {{-- error message will pop up --}}
                            </div>
                        </div>
                        <div class="col-sm-8">
                        <form action="{{ url('/dashboard/products/add') }}" method="post">
                        @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter product name" value="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Unit</label>
                                <div class="col-sm-10">
                                    <input type="text" name="unit" id="unit" class="form-control" placeholder="gm/kg" value="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="1" value="" />
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
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
