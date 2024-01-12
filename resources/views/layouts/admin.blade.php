<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{url('ruang-admin/img/logo/logo.png')}}" rel="icon">
    <title>RuangAdmin - Dashboard</title>
    @stack('prepend-styles')
    <link href="{{url('ruang-admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('ruang-admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('ruang-admin/css/ruang-admin.min.css')}}" rel="stylesheet">
    @stack('addon-styles')
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="{{url('ruang-admin/img/logo/logo2.png')}}">
                </div>
                <div class="sidebar-brand-text mx-3">RuangAdmin</div>
            </a>
            <hr class="sidebar-divider my-0">

            <li class="nav-item {{request()->is('dashboard') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Features
            </div>
            <li class="nav-item {{request()->is('categories*') ? 'active' : ''}}">
                <a class=" nav-link" href="{{route('categories.index')}}">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li class="nav-item {{request()->is('product*') ? 'active' : ''}}">
                <a class="nav-link" href=" {{route('product.index')}}">
                    <i class="fa fa-boxes" aria-hidden="true"></i>
                    <span>Product</span>
                </a>
            </li>
            <li class="nav-item {{request()->is('transactions*') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('transactions.index')}}">
                    <i class="fa fa-money-bill" aria-hidden="true"></i>
                    <span>Transactions</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.index')}}">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
            </li>
            <hr class="sidebar-divider">
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="{{url('ruang-admin/img/boy.png')}}" style="max-width: 60px">
                                <span class="ml-2 d-none d-lg-inline text-white small">{{Auth::user()->name}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <form action="{{url('logout')}}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item" href="">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    @yield('content')

                    <!-- Modal Logout -->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to logout?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                    <a href="login.html" class="btn btn-primary">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto py-2">
                    <div class="copyright text-center my-auto">
                        <span>copyright &copy; <script>
                                document.write(new Date().getFullYear());
                            </script> - Created By
                            <b><a href="" target="_blank">DimasAjiAnggono</a></b>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @stack('prepend-script')
    <script src="{{url('ruang-admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('ruang-admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('ruang-admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{url('ruang-admin/js/ruang-admin.min.js')}}"></script>
    @stack('addon-script')
</body>

</html>