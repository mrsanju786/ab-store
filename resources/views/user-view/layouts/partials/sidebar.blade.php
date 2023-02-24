<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"  data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{route('dashboard')}}">
            <img alt="Logo" src="{{asset('admin_site/assets/media/logos/foodiisoft-logo-new.png')}}"
                class="h-25px app-sidebar-logo-default" />
            <img alt="Logo" src="{{asset('admin_site/assets/media/logos/foodiisoft-logo-new.png')}}"
                class="h-10px app-sidebar-logo-minimize" />
        </a>
        <!--end::Logo image-->
    </div>
    <!--end::Logo-->

    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
              
             <!--=======  slider left category  =======-->
            <div class="hero-side-category">
                <!-- Category Toggle Wrap -->
                <div class="category-toggle-wrap">
                    <!-- Category Toggle -->
                    <button class="category-toggle"> 
                        <span class="arrow_carrot-right_alt2 mr-2"></span> All  Categories
                    </button>
                </div>

                <!-- Category Menu -->
                <nav class="category-menu">
                    <ul>
                        <li><a href="#">Vagatables</a></li>
                        <li class="menu-item-has-children"><a href="#">Salad</a>

                            <!-- Mega Category Menu Start -->
                            <ul class="category-mega-menu">
                                <li class="menu-item-has-children">
                                    <a class="megamenu-head" href="#">Vegetables</a>
                                    <ul>
                                        <li><a href="#">Salad</a></li>
                                        <li><a href="#">Fast Food</a></li>
                                        <li><a href="#">Fruits</a></li>
                                        <li><a href="#">Peanuts</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a class="megamenu-head" href="#">Fast Foods</a>
                                    <ul>
                                        <li><a href="#">Vegetables</a></li>
                                        <li><a href="#">Fast Food</a></li>
                                        <li><a href="#">Fruit</a></li>
                                        <li><a href="#">Butter</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a class="megamenu-head" href="#">Salad</a>
                                    <ul>
                                        <li><a href="#">Vegetables</a></li>
                                        <li><a href="#">Fast Food</a></li>
                                        <li><a href="#">Salad</a></li>
                                        <li><a href="#">Peanuts</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- Mega Category Menu End -->

                        </li>
                        <li class="menu-item-has-children"><a href="#">Fast Foods</a>

                            <!-- Mega Category Menu Start -->
                            <ul class="category-mega-menu">
                                <li class="menu-item-has-children">
                                    <a class="megamenu-head" href="#">Vegetables</a>
                                    <ul>
                                        <li><a href="#">Salad</a></li>
                                        <li><a href="#">Fast Food</a></li>
                                        <li><a href="#">Fruits</a></li>
                                        <li><a href="#">Peanuts</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a class="megamenu-head" href="#">Fast Foods</a>
                                    <ul>
                                        <li><a href="#">Vegetables</a></li>
                                        <li><a href="#">Fast Food</a></li>
                                        <li><a href="#">Fruit</a></li>
                                        <li><a href="#">Butter</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a class="megamenu-head" href="#">Salad</a>
                                    <ul>
                                        <li><a href="#">Vegetables</a></li>
                                        <li><a href="#">Fast Food</a></li>
                                        <li><a href="#">Salad</a></li>
                                        <li><a href="#">Peanuts</a></li>
                                    </ul>
                                </li>
                            </ul><!-- Mega Category Menu End -->

                        </li>
                        <li><a href="#">Beans</a></li>
                        <li><a href="#">Bread</a></li>
                        <li><a href="#">Fish &amp; Meats</a></li>
                        <li><a href="#">Peanuts</a></li>
                        <li><a href="#">Chiken</a></li>
                        <li><a href="#">Eggs</a></li>
                        <li><a href="#">Fruits</a></li>
                        <li><a href="#" id="more-btn"><span class="icon_plus_alt2"></span> More Categories</a></li>
                    </ul>
                </nav>
            </div>
            <!--=======  End of slider left category  =======-->
               
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->

</div>