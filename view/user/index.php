<div class="row">
	<div class="col">
		<h1>Usuarios</h1>
	</div>
</div>
<?php
    include_once("view/template/messages.php");
?>
<?php
    include_once("view/user/menu.php");
?>
<div class="row">
    <div class="col">
        <table class="table ">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>Editar | Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $key => $user) { ?>
                    <tr>
                        <td><?php echo $user->Name; ?></td>
                        <td><?php echo $user->Email; ?></td>
                        <td><?php echo $user->Profile == 1 ? "Maestro" : "Alumno"; ?></td>
                        <td>
                            <a href="index.php?sec=user&action=edit&id=<?php echo $user->IdUser ?>" class="btn btn-sm btn-primary">Editar</a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal">Eliminar</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="delete-modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Realmente desea eliminar éste usuario?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">No, Cerrar</button>
        <button type="button" class="btn btn-danger">Si, Eliminar</button>
      </div>
    </div>
  </div>
</div>