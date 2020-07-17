
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

  <title>Correio</title>
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
            <router-link to="/caixa_de_entrada" class="nav-link">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>Artigos</p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/enviadas" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>Enviadas</p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/rascunhos" class="nav-link">
              <i class="nav-icon fas fa-drafting-compass"></i>
              <p>Rascunhos</p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/arquivadas" class="nav-link">
              <i class="nav-icon fas fa-inbox"></i>
              <p>Arquivadas</p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/apagadas" class="nav-link">
              <i class="nav-icon fas fa-recycle"></i>
              <p>Apagadas</p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/contactos" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>Contactos</p>
            </router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-power-off red"></i>
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
      <!-- Modal -->
      <div id="novoEmail" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Novo email</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <form method="POST" action="/enviar" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label class="text-muted" style="float:right; margin-right: -25px">De:</label>
                    </div>
                  </div>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <input
                        placeholder="Nome"
                        type="text"
                        name="nome"
                        value='{{Auth::user()->email}}'
                        class="form-control"
                        disabled
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label class="text-muted" style="float:right; margin-right: -25px">Para:</label>
                    </div>
                  </div>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <input
                        placeholder="exemplo@inage.com"
                        type="email"
                        name="destinatario"
                        class="form-control"
                      />
                    </div>
                  </div>
                  </div>
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label class="text-muted" style="float:right; margin-right: -25px">CC + </label>
                    </div>
                  </div>
                  <div class="col-sm-9">
                    <div class="form-group">
                      <input
                        placeholder="Destinatario"
                        type="text"
                        name="nome"
                        class="form-control"
                      />
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <div class="form-group">
                      <button type="button" class="btn btn-default" style="color:cian; margin-left:-28px"><i class="nav-icon fas fa-plus"></i></button>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label class="text-muted" style="float:right; margin-right: -25px">Assunto:</label>
                    </div>
                  </div>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <input
                        placeholder=""
                        type="text"
                        name="assunto"
                        class="form-control"
                      />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label class="text-muted" style="float:right; margin-right: -25px">Mensagem:</label>
                    </div>
                  </div>
                  <div class="col-sm-10">
                    <div class="form-group">
                      <textarea
                        rows="7"
                        type="text"
                        name="mensagem"
                        class="form-control"
                      ></textarea>
                    </div>
                  </div>
                </div>
                <!--<div class="col-md-3">
                  <button class="btn btn-primary pull-left" id="btn_file">
                    <span class="fa fa-paperclip fa-2x"></span>
                    <input type="file" id="file" style="display: none;" />
                  </button>
                </div>-->
                </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-primary" >Guardar</button>
              <button type="submit" class="btn btn-success" >Enviar</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    <!-- End of modal -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="col-sm-4">    <router-view></router-view>
      <button id="btn_email" class="btn btn-danger mb-10" data-toggle="modal" data-target="#novoEmail" style="position:fixed; bottom: 50px; right:50px;border-radius: 30px;">
        <i class="fa fa-pen"></i> Escrever
      </button>
    </div>
    <router-view></router-view>
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
    <strong>Copyright &copy; 2020 <a href="#">Correio do Governo</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<script>
  document.getElementById("active_first").class = "nav-link router-link-exact-active router-link-active";
</script>
<script src="/js/app.js"></script>
</body>
</html>
