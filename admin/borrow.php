<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Préstamo de Libros
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
          <li>Transacción</li>
          <li class="active">Préstamo</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <?php
          // Mostrar mensajes de error si existen
          if(isset($_SESSION['error'])){
            ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-warning"></i> ¡Error!</h4>
              <ul>
                <?php
                  foreach($_SESSION['error'] as $error){
                    echo "<li>".$error."</li>";
                  }
                ?>
              </ul>
            </div>
            <?php
            unset($_SESSION['error']);
          }

          // Mostrar mensaje de éxito si existe
          if(isset($_SESSION['success'])){
            echo "
              <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> ¡Éxito!</h4>
                ".$_SESSION['success']."
              </div>
            ";
            unset($_SESSION['success']);
          }
        ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <!-- Botón para agregar nuevo préstamo -->
                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Prestar</a>
              </div>
              <div class="box-body">
                <!-- Tabla de préstamos -->
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th class="hidden"></th>
                    <th>Fecha</th>
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>ISBN</th>
                    <th>Título</th>
                    <th>Estado</th>
                  </thead>
                  <tbody>
                    <?php
                      // Consulta para obtener información sobre préstamos
                      $sql = "SELECT *, students.student_id AS stud, borrow.status AS barstat FROM borrow LEFT JOIN students ON students.id=borrow.student_id LEFT JOIN books ON books.id=borrow.book_id ORDER BY date_borrow DESC";
                      $query = $conn->query($sql);

                      // Iterar sobre los resultados y mostrar en la tabla
                      while($row = $query->fetch_assoc()){
                        $status = ($row['barstat']) ? '<span class="label label-success">devuelto</span>' : '<span class="label label-danger">no devuelto</span>';

                        echo "
                          <tr>
                            <td class='hidden'></td>
                            <td>".date('M d, Y', strtotime($row['date_borrow']))."</td>
                            <td>".$row['stud']."</td>
                            <td>".$row['firstname'].' '.$row['lastname']."</td>
                            <td>".$row['isbn']."</td>
                            <td>".$row['title']."</td>
                            <td>".$status."</td>
                          </tr>
                        ";
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/borrow_modal.php'; ?>
  </div>

  <?php include 'includes/scripts.php'; ?>

  <!-- Script para agregar dinámicamente campos de ISBN -->
  <script>
    $(function(){
      $(document).on('click', '#append', function(e){
        e.preventDefault();
        $('#append-div').append(
          '<div class="form-group"><label for="" class="col-sm-3 control-label">ISBN</label><div class="col-sm-9"><input type="text" class="form-control" name="isbn[]"></div></div>'
        );
      });
    });
  </script>
</body>
</html>
