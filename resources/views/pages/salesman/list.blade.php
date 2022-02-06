@extends('layout.under_dashboard')

@section('main-container')


    {{-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">
 --}}
<script type="text/javascript">
//  $(document).ready(function(){
//         $(".delete").click(function(e){ alert('as');
//             $this  = $(this);
//             e.preventDefault();
//             var url = $(this).attr("href");
//             $.get(url, function(r){
//                 if(r.success){
//                     $this.closest("tr").remove();
//                 }
//             })
//         });
//     });
// $(document).ready(function(){
//         $(".enable").click(function(e){ alert('as');
//             $this  = $(this);
//             e.preventDefault();
//             var url = $(this).attr("href");
//             $.get(url, function(r){
//                 if(r.success){
//                     $this.closest("tr").remove();
//                 }
//             })
//         });
//     });
// $(document).ready(function(){
//         $(".desable").click(function(e){ alert('as');
//             $this  = $(this);
//             e.preventDefault();
//             var url = $(this).attr("href");
//             $.get(url, function(r){
//                 if(r.success){
//                     $this.closest("tr").remove();
//                 }
//             })
//         });
//     });
</script>


            <div class="page-header">
                <div class="page-header-title">
                    <h4>List Salesman</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/dashboard/users/list">Salesman</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ url('/') }}/dashboard/users/list">List Salesman</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Page-header end -->
            <!-- Page-body start -->
            <div class="page-body">
                <!-- DOM/Jquery table start -->

                <div class="card">
                    <div class="card-block">
                        <div class="table-responsive dt-responsive">
                            <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Team leader</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Locality</th>
                                        <th>Pincode</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salesman as $key => $user)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->reporting_to }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ ($user->email == ''?'NA':$user->email) }}</td>
                                        <td>{{ ($user->phone == ''?'NA':$user->phone) }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->country }}</td>
                                        <td>{{ $user->state }}</td>
                                        <td>{{ $user->city }}</td>
                                        <td>{{ $user->locality }}</td>
                                        <td>{{ $user->pincode }}</td>
                                        <td>
                                            @if ($user->status == 1)
                                            <a class="label label-inverse-primary enable" href='{{ url('/') }}/dashboard/salesmans/status_change/{{ $user->id }}/0'>Enable</a>
                                            @else
                                            <a class="label label-inverse-warning desable" href='{{ url('/') }}/dashboard/salesmans/status_change/{{ $user->id }}/1'>Disable</a>
                                            @endif
                                            <a class="label label-inverse-info" href='{{ url('/') }}/dashboard/salesmans/update/{{ $user->id }}'>Edit</a>
                                            <a class="label label-inverse-danger " href='{{ url('/') }}/dashboard/salesmans/delete/{{ $user->id }}'>Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- DOM/Jquery table end -->
            </div>

@endsection
