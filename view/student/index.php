<div class="row">
	<div class="col">
		<h1>Estudiante - Escritorio</h1>
	</div>
</div>
<?php
    include_once("view/template/messages.php");
    //include_once("view/subject/menu.php");
?>
<div class="row">
    <div class="col">
        <h2>Materias seleccionadas</h2>
        <?php if(!$student_subjects) { ?>
            <div class="alert alert-danger" role="alert">
                Aún no se han seleccionado materias. Seleccionalas en la parte de abajo.
            </div>
        <?php } else { ?>
            <table class="table ">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Retícula</th>
                        <th>Nombre del Maestro</th>
                        <th>Horario (Inicio - Fin)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($student_subjects as $key => $student_subject) { ?>
                        <tr>
                            <td><?php echo $student_subject->name; ?></td>
                            <td><?php echo $student_subject->reticle; ?></td>
                            <td><?php echo $student_subject->teacher_name; ?></td>
                            <td><?php echo $student_subject->hour_start . ' - ' . $student_subject->hour_end; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>

<div class="row">
    <div class="col">
        <h2>Selecciona tus materias</h2>
        <?php if($student_subjects) { ?>
            <div class="alert alert-info" role="alert">
                Ya haz seleccionado tus materias.
            </div>
        <?php } else { ?>
            <dic class="row">
                <div class="col-md-6">
                    <h3>Materias disponibles</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Materia</th>
                                <th>Retícula</th>
                                <th>Maestro</th>
                                <th>Horario</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody id="body-available-subjects">
                            <?php foreach($subjects as $key => $subject): ?> 
                                <tr id="tr-subject-<?php echo $subject->id_subject ?>">
                                    <td><?php echo $subject->name; ?></td>
                                    <td><?php echo $subject->reticle; ?></td>
                                    <td><?php echo $subject->teacher_name; ?></td>
                                    <td><?php echo $subject->hour_start; ?> - <?php echo $subject->hour_end; ?></td>
                                    <td>
                                        <button 
                                            role="button" 
                                            id="agregar" 
                                            class="btn btn-primary btn-xs" 
                                            data-id_subject="<?php echo $subject->id_subject; ?>"
                                            data_>Agregar</button></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <h3>Materias seleccionadas</h3>
                    <form action="index.php?sec=student?option=savesubjects"></form>
                        <table class="table">
                            <tbody id="body-selected-subjects">
                                <tr>
                                    <td>----</td>
                                    <td>----</td>
                                    <td>----</td>
                                    <td>----</td>
                                </tr>    
                            </tbody>
                            <tfoot>
                                <tr>
                                 <td colspan="4">
                                    <input type="hidden" id="txt_selected_subjects" value="">
                                    <button role="submit" class="btn btn-success">Guardar materias</button>
                                 </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </dic>
        <?php } ?>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#agregar').click(function() {
        var id_subject = $(this).data('id_subject');      
        ids_selected_subjects = $("#txt_selected_subjects").val();
        if (ids_selected_subjects.indexOf(id) < 0) {
            agregar_subject(value, text);
        }
    });

    function agregar_subject()
});

</script>