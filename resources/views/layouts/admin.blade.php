<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name="_token" content="{{ csrf_token() }}"/>

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link href="{{url('css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{url('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <!-- Vendor CSS-->
    <link href="{{url('vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{url('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{url('vendor/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>

    <!-- Main CSS-->
    <link href="{{url('css/theme.css')}}" rel="stylesheet" media="all">
    <style type="text/css">
        .ui-timepicker-container {
      z-index: 3500 !important;
 }
    </style>

    @yield('css')

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{url('images/icon/logo.png')}}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{url('images/icon/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        @if(Auth::user()->role == 'admin')
                        <li class="{{ Request::path() ==  'admin/dashboard' ? 'active' : ''  }} ">
                            <a class="js-arrow " href="{{url('admin/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                        <hr>
                        <li class="">
                            Manage Data
                        </li>
                        <br>
                        <li class="has-sub {{ Request::path() ==  'admin/mahasiswa' ? 'active' : ''  }}">
                            <a href="#" class="js-arrow">
                            <i class="zmdi zmdi-graduation-cap"></i>Mahasiswa</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('admin/mahasiswa')}}">Data Mahasiswa</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/mahasiswa/create')}}">Tambah Mahasiswa</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="has-sub {{ Request::path() ==  'admin/dosen' ? 'active' : ''  }}">
                            <a href="#" class="js-arrow">
                            <i class="fa fa-user"></i>Dosen</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{url('admin/dosen')}}">Data Dosen</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/dosen/create')}}">Tambah Dosen</a>
                                </li>
                                
                            </ul>
                        </li>

                        <li class="has-sub {{ Request::path() ==  'admin/fakultas' ? 'active' : ''  }}">
                            <a href="{{url('admin/fakultas')}}" class="js-arrow">
                            <i class="zmdi zmdi-city"></i>Fakultas</a>
                            
                        </li>

                        <li class="has-sub {{ Request::path() ==  'admin/jurusan' ? 'active' : ''  }}">
                            <a href="{{url('admin/jurusan')}}" class="js-arrow">
                            <i class="fas fa-briefcase"></i>Jurusan</a>
                            
                        </li>
                        <li class="has-sub {{ Request::path() ==  'admin/matkul' ? 'active' : ''  }}">
                            <a href="{{url('admin/matkul')}}" class="js-arrow">
                            <i class="fas fa-book"></i>Mata Kuliah</a>
                            
                        </li>
                        <li class="has-sub {{ Request::path() ==  'admin/ruangan' ? 'active' : ''  }}">
                            <a href="{{url('admin/ruangan')}}" class="js-arrow">
                            <i class="zmdi zmdi-local-store"></i>Ruangan</a>
                            
                        </li>

                        <li class="has-sub {{ Request::path() ==  'admin/kelas' ? 'active' : ''  }}">
                            <a href="{{url('admin/kelas')}}" class="js-arrow">
                            <i class="zmdi zmdi-account-box-mail"></i>Kelas</a>
                            
                        </li>
                        <li class="{{ Request::path() ==  'admin/jadwal' ? 'active' : ''  }}">
                            <a href="{{url('admin/jadwal')}}" class="js-arrow">
                            <i class="zmdi zmdi-calendar-check"></i>Jadwal</a>
                            
                        </li>
                        @else
                        <li class="{{ Request::path() ==  'mahasiswa/dashboard' ? 'active' : ''  }} ">
                            <a class="js-arrow " href="{{url('mahasiswa/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                           
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{Auth::user()->name}}</a>
                                                    </h5>
                                                    <span class="email">{{Auth::user()->email}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit(); ">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @yield('content')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    @yield('modal')
    <!-- Jquery JS-->
    <script src="{{url('vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{url('vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- Vendor JS       -->
    <script src="{{url('vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{url('vendor/wow/wow.min.js')}}"></script>
    <script src="{{url('vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{url('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    
    <script src="{{url('vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{url('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{url('vendor/sweetalert/sweetalert2.min.js')}}"></script>

 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
    <script src="{{url('vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{url('js/main.js')}}"></script>
    
    @yield('js')

</body>

</html>
<!-- end document-->
