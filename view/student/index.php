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
                    <h3>Disponibles</h3>
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
                                        <button role="button" id="agregar" class="btn btn-primary btn-xs btn-agregar-subject-<?php echo $subject->id_subject; ?>" data-id_subject="<?php echo $subject->id_subject; ?>" data-hour_start="<?php echo $subject->hour_start; ?>" data-hour_end="<?php echo $subject->hour_end; ?>" >Agregar</button>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <h3>Selección</h3>
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
                    <form id="form_add_subjects" action="index.php?sec=student&action=SaveSubjects" method="post">
                        <input type="hidden" id="txt_selected_subjects" name="txt_selected_subjects" value="">
                        <button id="btn_save" role="submit" class="btn btn-success disabled">Guardar materias</button>
                    </form>
                </div>
            </dic>
        <?php } ?>
    </div>
</div>

<script>
$(document).ready(function(){

    var selected_subjects = [];
    $(document).on("click", '#agregar', function() {
        var id_subject = $(this).data('id_subject');      
        var hour_start = $(this).data('hour_start');      
        var hour_end = $(this).data('hour_end');
        // Checamos si se empalman las horas
        
        if(check_hour_over(hour_start, hour_end)) {
            if (!check_subject_selected(id_subject)) {
                add_subject(id_subject, hour_start, hour_end);
            }
        } else {
            alert("Horario se empalma con otra materia")
        }

    });

    $(document).on("click", '#eliminar', function() {
        var id_subject = $(this).data('id_subject');
        delete_subject(id_subject);
    });

    $(document).on("click", '#btn_save', function(e) {
        e.preventDefault();
        add_id_subjects_to_input();
        $("#form_add_subjects").submit();
    });


    function check_hour_over(hour_start, hour_end){
        var no_over = true;
        selected_subjects.forEach( function(value) { 
            if( (hour_start >= value.start && hour_start < value.end) || (hour_end >= value.start && hour_end < value.end) ) {
                no_over = false;
            }
        });

        return no_over;
    }

    function check_subject_selected(id_subject){
        var selected = false;
        selected_subjects.forEach( function(value) { 
            if(id_subject == value.id) {
                selected = false;
            }
        });

        return selected;
    }

    function add_id_subjects_to_input(){
        selected_subjects.forEach( function(value) { 
            var input = $("#txt_selected_subjects").val();
            $("#txt_selected_subjects").val(input + value.id + ",");
        });
    }


    function check_if_empty() {
        if(selected_subjects != ''){
            $("#btn_save").removeClass('disabled');
        }
        else {
            $("#btn_save").addClass('disabled');
        }
    }

    function delete_subject_from_array(id) {
        console.log(selected_subjects);
        selected_subjects.forEach( function(value, key) { 
            if(id == value.id) {
                selected_subjects.splice(key,1);
            }
        } );
        console.log(selected_subjects);        
    }

    function add_subject(id, hour_start, hour_end){
        // Agregamos el id al string
        //ids_selected_subjects = ids_selected_subjects + id + ',';
        // Agregamos los horarios
        selected_subjects.push({id: id, start: hour_start, end: hour_end});
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

    function delete_subject(id){
        // quitamos el objeto del array
        delete_subject_from_array(id);
        // lo quitamos 
        // Eliminamos el tr de la seleccion
        $("#tr-selected-subject-" + id).remove();
        // activamos el boton en materias
        $(".btn-agregar-subject-" + id).removeClass('disabled');
        // checamos si string de ids esta vacio para desactivar boton
        check_if_empty();
    }

    

    
});

</script>