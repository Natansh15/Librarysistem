<?php
  session_start();
  if(isset($_SESSION['admin'])){
    header('location:home.php');
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
    <img src="/libsystem/images/UTLD1.png"  style="width: 250px; height: 100px; display: inline;" class="logo-lg">
    </div>
  
    <div class="login-box-body">
        <p class="login-box-msg">Inicia sesión para comenzar tu sesión</p>

        <form action="login.php" method="POST">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="username" placeholder="Ingresa tu nombre de usuario" required autofocus>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Ingresa tu contraseña" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-5">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Iniciar Sesión</button>
                </div>
            </div>
        </form>
    </div>
    <?php
        if(isset($_SESSION['error'])){
            echo "
                <div class='callout callout-danger text-center mt20'>
                    <p>".$_SESSION['error']."</p> 
                </div>
            ";
            unset($_SESSION['error']);
        }
    ?>
</div>
    
<?php include 'includes/scripts.php' ?>
</body>
</html>
