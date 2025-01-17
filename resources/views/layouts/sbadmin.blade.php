<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dr. Pet</title>
    <link rel="icon" href="{{asset('img/DrPetLogo.png')}}" type="image">
    <!-- Custom fonts for this template-->
    <link href="{{asset('libs/fontawesome/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <link href="{{asset('libs/sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/datatables/dataTables.bootstrap4.min.css') }}">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-paw" style="color:#fb6767"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Dr. Pet <sup>APP</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Users CRUD Solo los admins pueden-->
            @can('viewAny',Auth::user())
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/user') }}">
                    <i class="fas fa-users"></i>
                    <span>Usuarios</span>
                </a>
            </li>
            @endcan
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menú
            </div>

            <!-- Nav Item - Pets-Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-dog fa-cog"></i>
                    <span>Mascotas</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="{{ route('pet.create')}}">Agregar mascota</a>
                        <a class="collapse-item" href="{{ route('pet.index') }}">Listar mascotas</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Products-Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
                    aria-expanded="true" aria-controls="collapseProducts">
                    <i class="fas fa-cart-plus"></i>
                    <span>Productos</span>
                </a>
                <div id="collapseProducts" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="{{ route('product.create') }}">Registrar producto</a>
                        <a class="collapse-item" href="{{ route('product.index') }}">Listar productos</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Products-Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTreatments"
                    aria-expanded="true" aria-controls="collapseTreatments">
                    <i class="fas fa-stethoscope"></i>
                    <span>Tratamientos</span>
                </a>
                <div id="collapseTreatments" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="{{ route('treatment.create') }}">Registrar tratamiento</a>
                        <a class="collapse-item" href="{{ route('treatment.index') }}">Listar tratamientos</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Adoptions-Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('adoption.index')}}"  data-target="#collapseAdoptions"
                    aria-expanded="true" aria-controls="collapsAdoptions">
                    <i class="fas fa-hand-holding-heart"></i>
                    <span>Adopciones</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    @auth
                        @if (Auth::user()->email_verified_at !== null)
                        <div class="text-success">
                            <i class="fas fa-check-circle"></i>
                            Verificado
                        </div>
                        @else
                        <div class="text-danger">
                            <i class="fas fa-exclamation-circle danger"></i>
                            No verificado
                        </div>
                        @endif
                    @endauth

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @auth
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                @endauth
                                <img class="img-profile rounded-circle"
                                    src="{{asset('img/usuario.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuración
                                </a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                   @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-whitw">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span><strong>Copyright &copy; Dr. Pet 2021</strong></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Seguro que quiere salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Presione "Salir" para confirma su salida del sistema.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="btn btn-primary" href="{{ route('logout') }}"
                            onclick="event.preventDefault();this.closest('form').submit();">Salir</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('libs/sbadmin/js/sb-admin-2.min.js')}}"></script>
    <script src="{{ asset('libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('libs/datatables/tables.js') }}"></script>

</body>

</html>
