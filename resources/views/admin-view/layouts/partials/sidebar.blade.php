<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper logo-wrapper-center">
            <a href="{{route('dashboard')}}" data-bs-original-title="" title="">
                <img class="img-fluid for-dark" src="{{asset('admin_site/assets/images/logo/logo-white.png')}}" alt="">
            </a>
            <div class="back-btn">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="grid"></i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="{{route('dashboard')}}">
                <img class="img-fluid main-logo" src="{{asset('admin_site/assets/images/logo/logo.png')}}" alt="logo">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>

            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"></li>
                    <li class="sidebar-main-title sidebar-main-title-3">
                        <div>
                            <h6 class="lan-1">General</h6>
                            <p class="lan-2">Dashboards &amp; Users.</p>
                        </div>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{route('dashboard')}}">
                            <i data-feather="home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i data-feather="users"></i>
                            <span>Banner</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{url('admin/banner/index')}}">All Banner</a>
                            </li>
                            <li>
                                <a href="{{url('admin/banner/create')}}">Add new banner</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i data-feather="users"></i>
                            <span>Category</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{url('admin/category/index')}}">All Category</a>
                            </li>
                            <li>
                                <a href="{{url('admin/category/create')}}">Add new category</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i data-feather="users"></i>
                            <span>Product</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{url('admin/product/index')}}">All Product</a>
                            </li>
                            <li>
                                <a href="{{url('admin/product/create')}}">Add new product</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-main-title sidebar-main-title-2">
                        <div>
                            <h6 class="lan-1">Application</h6>
                            <p class="lan-2">Ready To Use Apps</p>
                        </div>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i data-feather="archive"></i>
                            <span>Users</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{url('admin/index')}}">User List</a>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i data-feather="archive"></i>
                            <span>Staff</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{url('admin/staff/index')}}">Staff List</a>
                            </li>

                            <li>
                                <a href="{{url('admin/staff/create')}}">Add new staff</a>
                            </li>
                            
                        </ul>
                    </li>

                    <!-- <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i data-feather="users"></i>
                            <span>Venders</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="vendor-list.html">Vendor List</a>
                            </li>

                            <li>
                                <a href="create-vendor.html">Create Vendor</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i data-feather="users"></i>
                            <span>Localization</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="translation.html">Translation</a>
                            </li>

                            <li>
                                <a href="currency-rates.html">Currency Rates</a>
                            </li>

                            <li>
                                <a href="taxes.html">Taxes</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i data-feather="box"></i>
                            <span>Product</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="products.html">Prodcts</a>
                            </li>

                            <li>
                                <a href="add-new-product.html">Add New Products</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i data-feather="align-left"></i>
                            <span>Menus</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="menu-lists.html">Menu Lists</a>
                            </li>

                            <li>
                                <a href="create-menu.html">Create Menu</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i data-feather="tag"></i>
                            <span>Coupons</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="coupon-list.html">Coupon List</a>
                            </li>

                            <li>
                                <a href="create-coupon.html">Create Coupon</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="product-review.html">
                            <i data-feather="star"></i>
                            <span>Product Review</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="invoice.html">
                            <i data-feather="archive"></i>
                            <span>Invoice</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="support-ticket.html">
                            <i data-feather="phone"></i>
                            <span>Support Ticket</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i data-feather="settings"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="profile-setting.html">Profile Setting</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="reports.html">
                            <i data-feather="file-text"></i>
                            <span>Reports</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="list-page.html">
                            <i data-feather="list"></i>
                            <span>List Page</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="login.html">
                            <i data-feather="log-in"></i>
                            <span>Log In</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="forgot-password.html">
                            <i data-feather="key"></i>
                            <span>Forgot Password</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="sign-up.html">
                            <i data-feather="plus-circle"></i>
                            <span>Register</span>
                        </a>
                    </li> -->
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </nav>
    </div>
</div>
<!-- Page Sidebar Ends-->