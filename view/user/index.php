<div class="row">
	<div class="col">
		<h1>Usuarios</h1>
	</div>
</div>
<?php
    include_once("view/template/messages.php");
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
                <?php foreach($users as $key => $user): ?>
                    <tr>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td>
                            <?php 
                            if($user->profile == 0){ echo "Admin"; }
                            else if($user->profile == 1){ echo "Maestro"; }
                            else { echo "Alumno"; }
                            ?>
                        <td>
                            <?php if($user->profile != 0): ?>
                                <button type="button" id="delete" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal" data-id="<?php echo $user->id_user; ?>">Eliminar</button>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
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
        <form action="?sec=user&action=delete" method="post">
            <input id="id_user" name="id_user"   type="hidden" value="">
            <button type="button" class="btn btn-primary" data-dismiss="modal">No, Cerrar</button>
            <button type="submit" class="btn btn-danger btn-ok">Si, Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    $('#delete-modal').on('show.bs.modal', function(e) {
        // Obtenemos id en el boton
        var id = $(e.relatedTarget).data('id');
        // lo anexamos al form en el modal
        $(this).find('#id_user').attr('value', id);
    });
});
</script>