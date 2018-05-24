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
                <div class="col-lg-6">
                    <h3>Materias disponibles</h3>
                    <table class="table table-striped table-custom-heigth">
                        <thead>
                            <tr>
                                <th>Materia</th>
                                <th>Retícula</th>
                                <th>Maestro</th>
                                <th>Horario</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody id="body-available-subjects table-custom-heigth">
                            <?php foreach($subjects as $key => $subject): ?> 
                                <tr id="tr-subject-<?php echo $subject->id_subject ?>">
                                    <td><?php echo $subject->name; ?></td>
                                    <td><?php echo $subject->reticle; ?></td>
                                    <td><?php echo $subject->teacher_name; ?></td>
                                    <td><?php echo $subject->hour_start; ?> - <?php echo $subject->hour_end; ?></td>
                                    <td>
                                        <button role="button" id="agregar" class="btn btn-primary btn-xs btn-agregar-subject-<?php echo $subject->id_subject; ?>" data-id_subject="<?php echo $subject->id_subject; ?>">Agregar</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <h3>Materias seleccionadas</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Materia</th>
                                <th>Retícula</th>
                                <th>Maestro</th>
                                <th>Horario</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody id="body-selected-subjects" class="table-custom-heigth">
                            
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12 text-right">
                    <form action="index.php?sec=student?option=savesubjects"></form>
                        <input type="hidden" id="txt_selected_subjects" value="">
                        <button id="btn_save" role="submit" class="btn btn-success disabled">Guardar materias</button>
                    </form>
                </div>
            </dic>
        <?php } ?>
    </div>
</div>

<script>
$(document).ready(function(){

    var ids_selected_subjects = '';
    var hours = {};
    $(document).on("click", '#agregar', function() {
        var id_subject = $(this).data('id_subject');      
        //ids_selected_subjects = $("#txt_selected_subjects").val();
        if (ids_selected_subjects.indexOf(id_subject) < 0) {
            agregar_subject(id_subject);
        }
    });

    $(document).on("click", '#eliminar', function() {
        var id_subject = $(this).data('id_subject');
        eliminar_subject(id_subject);
    });


    function check_if_empty() {
        if(ids_selected_subjects != ''){
            $("#btn_save").removeClass('disabled');
        }
        else {
            $("#btn_save").addClass('disabled');
        }
        console.log(ids_selected_subjects);
    }

    function agregar_subject(id){
        // Agregamos el id al string
        ids_selected_subjects = ids_selected_subjects + id + ',';
        // guardamos el contenido del tr para pasarlo a la columna
        // de materias seleccionadas
        var html = $("#tr-subject-" + id).html();
        // agregamos etiqueta <tr>
        html = '<tr id="tr-selected-subject-' + id + '">' + html + '</tr>';
        // reemplazamos el boton de agregar por el de quitar
        html = html.replace('id="agregar"', 'id="eliminar"');
        html = html.replace('btn-primary', 'btn-danger');        
        html = html.replace('btn-agregar-subject-' + id, 'btn-eliminar-subject-' + id);
        html = html.replace('Agregar', 'Eliminar');        
                
        // lo anexamos a la columna de materias seleccionadas
        $("#body-selected-subjects").append(html);
        // desactivamos el boton
        $(".btn-agregar-subject-" + id).addClass('disabled');
        // checamos si string de ids esta vacio para desactivar boton
        check_if_empty();
    }

    function eliminar_subject(id){
        // quitamos el id del string de ids
        ids_selected_subjects = ids_selected_subjects.replace(id+',', '');
        // Eliminamos el tr de la seleccion
        $("#tr-selected-subject-" + id).remove();
        // activamos el boton en materias
        $(".btn-agregar-subject-" + id).removeClass('disabled');
        // checamos si string de ids esta vacio para desactivar boton
        check_if_empty();
    }

    
});

</script>