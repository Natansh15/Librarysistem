<!-- Inicio de Sesión -->
<div class="modal fade" id="login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Iniciar Sesión</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="login.php">
                <div class="form-group">
                    <label for="student" class="col-sm-3 control-label">Matricula</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="student" name="student" pattern="[0-9]{8}" title="Por favor ingresa una matricula valida" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              <button type="submit" class="btn btn-primary btn-flat" name="login"><i class="fa fa-sign-in"></i> Iniciar Sesión</button>
              </form>
            </div>
        </div>
    </div>
</div>
