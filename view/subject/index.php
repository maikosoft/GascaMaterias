<div class="row">
	<div class="col">
		<h1>Materias</h1>
	</div>
</div>
<?php
    include_once("view/template/messages.php");
    include_once("view/user/menu.php");
?>
<div class="row">
    <div class="col">
        <?php if(!$subjects) { ?>
            <p>Aún no se han registrado materias</p>
        <?php } else { ?>
            <table class="table ">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Retícula</th>
                        <th>Nombre del Maestro</th>
                        <th>Horario (Inicio - Fin)</th>
                        <th>Máximo de estudiantes</th>
                        <th>Status</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($subjects as $key => $subject) { ?>
                        <tr>
                            <td><?php echo $subject->name; ?></td>
                            <td><?php echo $subject->reticle; ?></td>
                            <td><?php echo $subject->teacher_name; ?></td>
                            <td><?php echo $subject->hour_start . ' - ' . $subject->hour_end; ?></td>
                            <td><?php echo $subject->max_students; ?></td>
                            <td><?php echo $subject->status == 1 ? "Activa" : "Inactiva"; ?></td>
                            <td>
                                <button type="button" id="delete" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-modal" data-id="<?php echo $subject->id_subject; ?>">Eliminar</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
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
        var id = $(e.relatedTarget).data('id');
        console.log(id);
        $(this).find('#id_user').attr('value', id);
    });
});
</script>