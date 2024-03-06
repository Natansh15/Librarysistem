<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
    <div class="navbar-header" style="display: flex; align-items: center;">
    <a href="https://www.utlagunadurango.edu.mx" class="navbar-brand" style="display: flex; align-items: center;">
        <img src="/libsystem/images/UTLD1.png" style="max-width: 100px; max-height: 100px;" class="logo-lg">
    </a>
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <i class="fa fa-bars"></i>
    </button>
</div>


      <!-- Recopilar los enlaces de navegación, formularios y otros contenidos para activar/desactivar -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <?php
            if(isset($_SESSION['student'])){
              echo "
                <li><a href='index.php'>INICIO</a></li>
                <li><a href='transaction.php'>TRANSACCIONES</a></li>
              ";
            } 
          ?>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Menú de la barra de navegación a la derecha -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php
            if(isset($_SESSION['student'])){
              $photo = (!empty($student['photo'])) ? 'images/'.$student['photo'] : 'images/profile.jpg';
              echo "
                <li class='user user-menu'>
                  <a href='#'>
                    <img src='".$photo."' class='user-image' alt='User Image'>
                    <span class='hidden-xs'>".$student['firstname'].' '.$student['lastname']."</span>
                  </a>
                </li>
                <li><a href='logout.php'><i class='fa fa-sign-out'></i> CERRAR SESIÓN</a></li>
              ";
            }
            else{
              echo "
                <li><a href='#login' data-toggle='modal'><i class='fa fa-sign-in'></i> INGRESAR</a></li>
              ";
            } 
          ?>
        </ul>
      </div>
      <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>
<?php include 'includes/login_modal.php'; ?>
