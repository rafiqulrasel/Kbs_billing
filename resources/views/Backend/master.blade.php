<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{asset('backend/images/logo.png')}}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Dashboard - KBS Billing System</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('backend/css/app.css')}}" />
@yield('style')
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="app">
<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{asset('backend/images/logo.png')}}">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="{{route('dashboard')}}" class="menu menu--active">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"> <i data-feather="box"></i> </div>
                <div class="menu__title"> Menu Layout <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="index.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Side Menu </div>
                    </a>
                </li>
                <li>
                    <a href="simple-menu-light-dashboard.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Simple Menu </div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-light-dashboard.html" class="menu">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Top Menu </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="side-menu-light-inbox.html" class="menu">
                <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="menu__title"> Inbox </div>
            </a>
        </li>
        <li>
            <a href="side-menu-light-file-manager.html" class="menu">
                <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="menu__title"> File Manager </div>
            </a>
        </li>
        <li>
            <a href="side-menu-light-point-of-sale.html" class="menu">
                <div class="menu__icon"> <i data-feather="credit-card"></i> </div>
                <div class="menu__title"> Point of Sale </div>
            </a>
        </li>
        <li>
            <a href="side-menu-light-chat.html" class="menu">
                <div class="menu__icon"> <i data-feather="message-square"></i> </div>
                <div class="menu__title"> Chat </div>
            </a>
        </li>
        <li>
            <a href="side-menu-light-post.html" class="menu">
                <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="menu__title"> Post </div>
            </a>
        </li>
        <li class="menu__devider my-6"></li>

        <li class="menu__devider my-6"></li>

    </ul>
</div>
<!-- END: Mobile Menu -->
<div class="flex">
    <!-- BEGIN: Side Menu -->
    <nav class="side-nav">
        <a href="" class="intro-x flex items-center pl-5 pt-4">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{asset('backend/images/logo.png')}}">
            <span class="hidden xl:block text-white text-lg ml-3"> KBS <span class="font-medium">Billing System</span> </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="{{route('dashboard')}}" class="side-menu {{current_route_menu_active(null)}}">
                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="side-menu__title"> Dashboard </div>
                </a>
            </li>
            <li>
                <a href="{{route('dashboard.package.index')}}" class="side-menu {{current_route_menu_active("package")}} ">
                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="side-menu__title"> Package </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="side-menu {{current_route_menu_active("building")}} {{current_route_menu_active("floor")}} {{current_route_menu_active("room")}}">
                    <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                    <div class="side-menu__title"> Location <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{route('dashboard.building.index')}}" class="side-menu ">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Building Management</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.floor.index')}}" class="side-menu ">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Floor Management</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.room.index')}}" class="side-menu ">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Room Management</div>
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="{{route('dashboard.client.index')}}" class="side-menu {{current_route_menu_active("client")}}">
                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="side-menu__title"> Client Management </div>
                </a>
            </li>
            <li>
                <a href="{{route('dashboard.duecollection.index')}}" class="side-menu {{current_route_menu_active("duecollection")}}">
                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="side-menu__title"> Due Collection </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="side-menu {{current_route_menu_active("user")}} {{current_route_menu_active("roles")}}">
                    <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                    <div class="side-menu__title"> Report <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>

                </a>
                <ul class="">

                    <li>
                        <a href="{{route('dashboard.roles.index')}}" class="side-menu ">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> All Connection </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.roles.index')}}" class="side-menu ">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Monthly Due</div>
                        </a>
                    </li>

                        <li>
                            <a href="{{route('dashboard.user.index')}}" class="side-menu ">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> User Collections </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('dashboard.roles.index')}}" class="side-menu ">
                                <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                <div class="side-menu__title"> All Collection</div>
                            </a>
                        </li>



                </ul>

            </li>
            <li>
                <a href="javascript:;" class="side-menu {{current_route_menu_active("user")}} {{current_route_menu_active("roles")}}">
                    <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                    <div class="side-menu__title"> User Management <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{route('dashboard.user.index')}}" class="side-menu ">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> User </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.roles.index')}}" class="side-menu ">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Role Management</div>
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;" class="side-menu {{current_route_menu_active("user")}} {{current_route_menu_active("roles")}}">
                    <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                    <div class="side-menu__title">Accounts <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{route('dashboard.accounts.index')}}" class="side-menu ">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Collections & Expences </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.roles.index')}}" class="side-menu ">
                            <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                            <div class="side-menu__title"> Report</div>
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="{{route('dashboard.settings.index')}}" class="side-menu {{current_route_menu_active("settings")}}">
                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="side-menu__title"> Settings </div>
                </a>
            </li>

        </ul>
        </li>

        </ul>
    </nav>
    <!-- END: Side Menu -->
    <!-- BEGIN: Content -->
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Application</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <div class="intro-x relative mr-3 sm:mr-6">
                <div class="search hidden sm:block">
                    <input type="text" class="search__input input placeholder-theme-13" placeholder="Search...">
                    <i data-feather="search" class="search__icon dark:text-gray-300"></i>
                </div>
                <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon dark:text-gray-300"></i> </a>
                <div class="search-result">
                    <div class="search-result__content">
                        <div class="search-result__content__title">Pages</div>
                        <div class="mb-5">
                            <a href="" class="flex items-center">
                                <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="inbox"></i> </div>
                                <div class="ml-3">Mail Settings</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="users"></i> </div>
                                <div class="ml-3">Users & Permissions</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full"> <i class="w-4 h-4" data-feather="credit-card"></i> </div>
                                <div class="ml-3">Transactions Report</div>
                            </a>
                        </div>
                        <div class="search-result__content__title">Users</div>
                        <div class="mb-5">
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-4.jpg">
                                </div>
                                <div class="ml-3">John Travolta</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">johntravolta@left4code.com</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-11.jpg">
                                </div>
                                <div class="ml-3">Tom Cruise</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">tomcruise@left4code.com</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-6.jpg">
                                </div>
                                <div class="ml-3">John Travolta</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">johntravolta@left4code.com</div>
                            </a>
                            <a href="" class="flex items-center mt-2">
                                <div class="w-8 h-8 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-13.jpg">
                                </div>
                                <div class="ml-3">Tom Cruise</div>
                                <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">tomcruise@left4code.com</div>
                            </a>
                        </div>
                        <div class="search-result__content__title">Products</div>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-13.jpg">
                            </div>
                            <div class="ml-3">Samsung Galaxy S20 Ultra</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp; Tablet</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-11.jpg">
                            </div>
                            <div class="ml-3">Dell XPS 13</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">PC &amp; Laptop</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-3.jpg">
                            </div>
                            <div class="ml-3">Samsung Q90 QLED TV</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/preview-5.jpg">
                            </div>
                            <div class="ml-3">Nike Tanjun</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Sport &amp; Outdoor</div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- END: Search -->
            <!-- BEGIN: Notifications -->
            <div class="intro-x dropdown mr-auto sm:mr-6">
                <div class="dropdown-toggle notification notification--bullet cursor-pointer"> <i data-feather="bell" class="notification__icon dark:text-gray-300"></i> </div>
                <div class="notification-content pt-2 dropdown-box">
                    <div class="notification-content__box dropdown-box__content box dark:bg-dark-6">
                        <div class="notification-content__title">Notifications</div>
                        <div class="cursor-pointer relative flex items-center ">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-4.jpg">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">John Travolta</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">05:09 AM</div>
                                </div>
                                <div class="w-full truncate text-gray-600">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-11.jpg">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Tom Cruise</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">03:20 PM</div>
                                </div>
                                <div class="w-full truncate text-gray-600">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-6.jpg">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">John Travolta</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">06:05 AM</div>
                                </div>
                                <div class="w-full truncate text-gray-600">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-13.jpg">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Tom Cruise</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">05:09 AM</div>
                                </div>
                                <div class="w-full truncate text-gray-600">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                            </div>
                        </div>
                        <div class="cursor-pointer relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-5.jpg">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <a href="javascript:;" class="font-medium truncate mr-5">Kevin Spacey</a>
                                    <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">01:10 PM</div>
                                </div>
                                <div class="w-full truncate text-gray-600">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Notifications -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                    <img alt="Midone Tailwind HTML Admin Template" src="{{asset('backend/images/logo.png')}}">
                </div>
                <div class="dropdown-box w-56">
                    <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                        <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                            <div class="font-medium">@if (Auth::check()){{auth()->user()->name}}@endif</div>
                            <div class="text-xs text-theme-41 dark:text-gray-600">Software Engineer</div>
                        </div>
                        <div class="p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                        </div>
                        <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
        <!-- END: Top Bar -->

                @yield('content')






    </div>
</div>
</div>
<!-- END: Content -->
</div>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
<!-- BEGIN: JS Assets-->
<script src="{{asset('backend/js/app.js')}}"></script>
<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<!-- END: JS Assets-->
@yield('script')
<script>
    $(document).ready(function (){
        $(".feather-x").click(function () {
            $('.myalertmessage').hide();
        });
    });
</script>
</body>
</html>




