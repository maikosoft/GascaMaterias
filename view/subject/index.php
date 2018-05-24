<div class="row">
	<div class="col">
		<h1>Materias</h1>
	</div>
</div>
<?php
    include_once("view/template/messages.php");
    include_once("view/subject/menu.php");
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
                            <td><?php echo $subject->status == 1 ? '<span class="badge badge-success">Activa</span>' : '<span class="badge badge-danger">Inactiva</span>'; ?></td>
                            <td>
                                <?php if($subject->status == false) { ?>
                                    <a href="index.php?sec=subject&action=ChangeStatus&id_subject=<?php echo $subject->id_subject ?>&value=1" role="button" id="activate" class="btn btn-success btn-sm">Activar</a>
                                <?php } else { ?>
                                    <a href="index.php?sec=subject&action=ChangeStatus&id_subject=<?php echo $subject->id_subject ?>&value=0" role="button" id="deactivate" class="btn btn-danger btn-sm">Desactivar</a>
                                <?php } ?>
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
        <p>¿Realmente desea eliminar ésta materia?</p>
      </div>
      <div class="modal-footer">
        <form action="?sec=subject&action=delete" method="post">
            <input id="id_subject" name="id_subject"  type="hidden" value="">
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
        // Obtenemos el id del boton
        var id = $(e.relatedTarget).data('id');
        //lo asignamos al input del form en el modal
        $(this).find('#id_subject').attr('value', id);
    });
});
</script>