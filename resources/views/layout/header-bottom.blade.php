<?php
//  if ($this->session -> userdata('email') == "" && $this->session -> userdata('login') != true && $this->session -> userdata('role_id') != 1) {
//       redirect('administrator/index');
//     }
 ?>

     <!-- Menu aside start -->
    <div class="main-menu">
        <div class="main-menu-content">
            <ul class="main-navigation">
				<li class="nav-item {{ Route::currentRouteName() == "dashboard"?'has-class':'' }}">
                    <a href="{{url('/')}}/dashboard">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!--<li class="nav-item">-->
                <!--    <a href="javascript:void(0)">-->
                <!--        <i class="ti-layout"></i>-->
                <!--        <span>Employees</span>-->
                <!--    </a>-->
                <!--    <ul class="tree-1">-->
                <!--        <li><a href="{{url('/')}}/dashboard/users/add">Add</a></li>-->
                <!--        <li><a href="{{url('/')}}/dashboard/users/list">List</a></li>-->
                <!--    </ul>-->
                <!--</li>-->

                <li class="nav-item {{ (
                    Route::currentRouteName() == "product_list" ||
                    Route::currentRouteName() == "product_add" ||
                    Route::currentRouteName() == "product_add_data" ||
                    Route::currentRouteName() == "product_update" ||
                    Route::currentRouteName() == "product_update_data" ||
                    Route::currentRouteName() == "product_delete" ||
                    Route::currentRouteName() == "product_status_change")?'has-class':'' }}">
                    <a href="javascript:void(0)">
                        <i class="ti-pencil"></i>
                        <span>Products</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{url('/')}}/dashboard/products/add">Add</a></li>
                        <li><a href="{{url('/')}}/dashboard/products/list">List</a></li>
                    </ul>
                </li>

                <li class="nav-item {{ (
                    Route::currentRouteName() == "price_list" ||
                    Route::currentRouteName() == "price_add" ||
                    Route::currentRouteName() == "price_add_data" ||
                    Route::currentRouteName() == "price_update" ||
                    Route::currentRouteName() == "price_update_data" ||
                    Route::currentRouteName() == "price_delete" ||
                    Route::currentRouteName() == "price_status_change")?'has-class':'' }}">
                    <a href="javascript:void(0)">
                        <i class="ti-paint-roller"></i>
                        <span>Price</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{url('/')}}/dashboard/prices/add">Add</a></li>
                        <li><a href="{{url('/')}}/dashboard/prices/list">List</a></li>
                    </ul>
                </li>


                <li class="nav-item {{ (
                    Route::currentRouteName() == "order_list" ||
                    Route::currentRouteName() == "order_view")?'has-class':'' }}">
                    <a href="javascript:void(0)">
                        <i class="ti-arrow-circle-down"></i>
                        <span>Orders</span>
                    </a>
                    <ul class="tree-1">
                        <!--<li><a href="{{url('/')}}/dashboard/template/add">Add</a></li>-->
                        <li><a href="{{url('/')}}/dashboard/order/list">List</a></li>
                    </ul>
                </li>


                <li class="nav-item {{ (
                    Route::currentRouteName() == "salesman_list" ||
                    Route::currentRouteName() == "salesman_add" ||
                    Route::currentRouteName() == "salesman_add_data" ||
                    Route::currentRouteName() == "salesman_update" ||
                    Route::currentRouteName() == "salesman_update_data" ||
                    Route::currentRouteName() == "salesman_delete" ||
                    Route::currentRouteName() == "salesman_status_change")?'has-class':'' }}">
                    <a href="javascript:void(0)">
                        <i class="ti-flag"></i>
                        <span>Salesman</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{url('/')}}/dashboard/salesmans/add">Add</a></li>
                        <li><a href="{{url('/')}}/dashboard/salesmans/list">List</a></li>
                    </ul>
                </li>

                <li class="nav-item {{ (
                    Route::currentRouteName() == "salesmanAllocation_list" ||
                    Route::currentRouteName() == "salesmanAllocation_add" ||
                    Route::currentRouteName() == "salesmanAllocation_add_data" ||
                    Route::currentRouteName() == "salesmanAllocation_update" ||
                    Route::currentRouteName() == "salesmanAllocation_update_data" ||
                    Route::currentRouteName() == "salesmanAllocation_delete" ||
                    Route::currentRouteName() == "salesmanAllocation_status_change")?'has-class':'' }}">
                    <a href="javascript:void(0)">
                        <i class="ti-layout"></i>
                        <span>Salesman Allocation</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{url('/')}}/dashboard/salesman-allocation/add">Add</a></li>
                        <li><a href="{{url('/')}}/dashboard/salesman-allocation/list">List</a></li>
                    </ul>
                </li>

                <li class="nav-item {{ (
                    Route::currentRouteName() == "shop_list" ||
                    Route::currentRouteName() == "shop_add" ||
                    Route::currentRouteName() == "shop_add_data" ||
                    Route::currentRouteName() == "shop_update" ||
                    Route::currentRouteName() == "shop_update_data" ||
                    Route::currentRouteName() == "shop_delete" ||
                    Route::currentRouteName() == "shop_status_change")?'has-class':'' }}">
                    <a href="javascript:void(0)">
                        <i class="ti-medall-alt"></i>
                        <span>Shop</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{url('/')}}/dashboard/shop/add">Add</a></li>
                        <li><a href="{{url('/')}}/dashboard/shop/list">List</a></li>
                    </ul>
                </li>

                <li class="nav-item {{ (
                    Route::currentRouteName() == "roles_list" ||
                    Route::currentRouteName() == "roles_add" ||
                    Route::currentRouteName() == "roles_add_data" ||
                    Route::currentRouteName() == "roles_update" ||
                    Route::currentRouteName() == "roles_update_data" ||
                    Route::currentRouteName() == "roles_delete" ||
                    Route::currentRouteName() == "roles_status_change")?'has-class':'' }}">
                    <a href="javascript:void(0)">
                        <i class="ti-marker"></i>
                        <span>Role</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="{{url('/')}}/dashboard/roles/add">Add</a></li>
                        <li><a href="{{url('/')}}/dashboard/roles/list">List</a></li>
                    </ul>
                </li>

                {{-- <li class="nav-item">
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
                </li> --}}
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
