
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Marie Sex Shop</title>
  <meta name="csrf-token" content="{{csrf_token()}}">
  
  <link rel = "stylesheet" href = "/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
</nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4"  style="background-color:black">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/imagens/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MAR\E <strong style="color:red">S</strong>ex Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/imagens/perfil/default.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
          <a href="#" class="d-block">{{Auth::user()->email}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <!-- <center>
          <button id="btn_email" class="btn btn-success mb-10" data-toggle="modal" data-target="#novoEmail">
            <i class="fa fa-pencil"></i> Escrever mensagem
          </button>
        </center>-->
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="top:10px">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li id="active_first" class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <i class="nav-icon fa fa-chart-pie"></i>
              <p>Estatisticas</p>
            </router-link>
          </li>
          <li id="active_first" class="nav-item">
            <router-link to="/artigos" class="nav-link">
              <i class="nav-icon fa fa-boxes"></i>
              <p>Artigos</p>
              @if($min < 5)
                <span class="right" style="float:right"><i class="nav-icon fas fa-bell" style="color:red"></i></span>
              @endif
            </router-link>
          </li>
          <li id="active_first" class="nav-item">
            <router-link to="/blog" class="nav-link">
              <i class="nav-icon fa fa-blog"></i>
              <p>Blog</p>
            </router-link>
          </li>
          <li id="active_first" class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dolly"></i>
              <p>
                Pedidos
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/pedidos" class="nav-link">  
                  <i class="nav-icon fas fa-dolly"></i>
                  <p>Activos</p>
                </router-link>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
              <router-link to="/pedidos_arquivados" class="nav-link">
                  <i class="nav-icon fas fa-archive"></i>
                  <p>Arquivados</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li id="active_first" class="nav-item">
            <router-link to="/vendas" class="nav-link">
              <i class="nav-icon fa fa-chart-line"></i>
              <p>Vendas</p>
            </router-link>
          </li> 
          <li id="active_first" class="nav-item">
            <router-link to="/categorias" class="nav-link">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>Categorias</p>
            </router-link>
          </li>
          <li id="active_first" class="nav-item">
            <router-link to="/pagina_inicial" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>Página Inicial</p>
            </router-link>
          </li>
          <li id="active_first" class="nav-item">
            <router-link to="/utilizadores" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>Utilizadores</p>
            </router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-power-off" style="color:red"></i>
              <p>
                Terminar sessão
              </p>
            </a>
              
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      <!-- Modal view -->
      
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <div class="col-sm-12"  style="top: 20px">
    <router-view></router-view>
    </div>
    </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{date('Y')}} <a style="color:red" href="#">Marie Sex Shop E.I.</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<script>
  document.getElementById("active_first").class = "nav-link router-link-exact-active router-link-active";
</script>
<script src="/js/app.js"></script>
</body>
</html>
