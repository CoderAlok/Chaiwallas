@extends('layout.under_dashboard')

@section('main-container')

    <div class="page-header">
        <div class="page-header-title">
            <h4>Salesman</h4>
        </div>
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="index-2.html">
                        <i class="icofont icofont-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Salesman</a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Add Salesman</a>
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
                        <h5>Add Salesman</h5>
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
                        <div class="col-sm-8">
                        <form action="{{ url('/dashboard/salesmans/add') }}" method="post">
                        @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">User Role</label>
                                <div class="col-sm-10">
                                    <select name="user_role" id="user_role" class="form-control">
                                        @foreach ($roles as $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter product name" value="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Reporting to</label>
                                <div class="col-sm-10">
                                    <select name="reporting_to" id="reporting_to" class="form-control">
                                        <option value="0">None</option>
                                        @foreach($teamlead as $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" value="" />
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" value="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Salesman Email" value="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Phone <b class="text-danger">*</b> </label>
                                <div class="col-sm-10">
                                    <input type="phone" name="phone" id="phone" class="form-control" placeholder="Salesman phone" value="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea name="address" id="address" class="form-control" rows="5" cols="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Country</label>
                                <div class="col-sm-10">
                                    <select name="country" id="country" class="form-control">
                                        @foreach($country as $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">State</label>
                                <div class="col-sm-10">
                                    <select name="state" id="state" class="form-control">
                                        @foreach($state as $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-10">
                                    <select name="city" id="city" class="form-control">
                                        @foreach($city as $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Locality</label>
                                <div class="col-sm-10">
                                    <input type="text" name="locality" id="locality" class="form-control" placeholder="locality" value="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pincode</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pincode" id="pincode" class="form-control" placeholder="pincode" value="" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-primary">Add Salesman</button>
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
