<?php
//  if ($this->session -> userdata('email') == "" && $this->session -> userdata('login') != true && $this->session -> userdata('role_id') != 1) {
//       redirect('administrator/index');
//     }
 ?>

     <!-- Menu aside start -->
    <div class="main-menu">
        <div class="main-menu-content">
            <ul class="main-navigation">
				<li class="nav-item has-class">
                    <a href="{{url('/')}}/dashboard">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="javascript:void(0)">
                        <i class="ti-layout"></i>
                        <span>Employees</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{url('/')}}/dashboard/users/add">Add User</a></li>
                        <li><a href="{{url('/')}}/dashboard/users/list">Users</a></li>
                    </ul>
                </li>

                {{-- <li class="nav-item">
                    <a href="javascript:void(0)">
                        <i class="ti-layout"></i>
                        <span>Templates</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{url('/')}}/dashboard/template/add">Add Templates</a></li>
                        <li><a href="{{url('/')}}/dashboard/template/list">Templates</a></li>
                    </ul>
                </li> --}}

                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-settings"></i>
                        <span>Template</span>
                    </a>
                    <ul class="tree-1">
                        <li class="nav-sub-item"><a href="#">Templates</a>
                            <ul class="tree-2">
                                <li><a href="{{url('/')}}/dashboard/template/add">Add</a></li>
                                <li><a href="{{url('/')}}/dashboard/template/list">List</a></li>
                            </ul>
                        </li>
                        <li class="nav-sub-item"><a href="#">Types</a>
                            <ul class="tree-2">
                                <li><a href="{{url('/')}}/dashboard/template-type/add">Add</a></li>
                                <li><a href="{{url('/')}}/dashboard/template-type/list">List</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="javascript:void(0)">
                        <i class="ti-layout"></i>
                        <span>Contents</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{url('/')}}/dashboard/contents/add">Add</a></li>
                        <li><a href="{{url('/')}}/dashboard/contents/list">List</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="javascript:void(0)">
                        <i class="ti-layout"></i>
                        <span>Pricing</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{url('/')}}/dashboard/pricing/add">Add</a></li>
                        <li><a href="{{url('/')}}/dashboard/pricing/list">List</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- Menu aside end -->
     <!-- Main-body start -->
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->


    {{-- <pre><?php $sess_data = (session('user_data')); ?></pre>
    {{ $sess_data->first_name }}{{ $sess_data->last_name }} --}}


    {{-- @if(session()->has('email'))
      <?php echo '<div class="alert alert-success icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Success! &nbsp;&nbsp;</strong>Success</p></div>'; ?>
    @else
      <?php echo '<div class="alert alert-danger icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Error! &nbsp;&nbsp;</strong>Danger</p></div>'; ?>
    @endif --}}

     {{-- <?php if(validation_errors() != null): ?> --}}
      {{-- <?php echo '<div class="alert alert-warning icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Alert! &nbsp;&nbsp;</strong>'.validation_errors().'</p></div>'; ?> --}}
    {{-- <?php endif; ?> --}}

    {{-- <?php if($this->session->flashdata('match_old_password')): ?> --}}
      {{-- <?php echo '<p class="alert alert-success">'.$this->session->flashdata('match_old_password').'</p>'; ?> --}}
    {{-- <?php endif; ?> --}}
