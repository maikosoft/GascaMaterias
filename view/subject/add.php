<div class="row">
	<div class="col">
		<h1>Agregar nueva materia</h1>
	</div>
</div>
<?php
    include_once("view/template/messages.php");
    include_once("view/user/menu.php");
?>
<div class="row">
	<div class="col">
		<form id="SubjectAddForm" action="index.php?sec=subject&action=add" method="POST" role="form">
			<div class="form-group">
				<label for="name">Nombre de la Materia</label>
				<input type="text" name="name" id="name" class="form-control"  placeholder="Nombre" >
			</div>
			<div class="form-group">
				<label for="reticle">Retícula</label>
				<input type="text" name="reticle" id="reticle" class="form-control" placeholder="Retícula">
			</div>
			<div class="form-group">
				<label for="teacher_name">Nombre del Maestro</label>
				<input type="text" name="teacher_name" id="teacher_name" class="form-control" placeholder="Nombre del Maestro">
			</div>
			<div class="form-group">
				<label>Horario</label>
                <div class="row">
                    <div class="col-md-3">
                        <label>Desde: </label>
                        <input type="time" name="hour_start" id="hour_start" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label>Hasta: </label>
                        <input type="time" name="hour_end" id="hour_end" class="form-control"> 
                    </div>
                </div>
            </div>
            <div class="form-group">
				<label for="max_students">Máximo de estudiantes</label>
				<input type="number" name="max_students" id="max_students" class="form-control">
			</div>
            <div class="form-group">
				<label>Estado</label><br>
				
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="status" value="1" checked>
				  	<label class="form-check-label" >Activa</label>
                    <input class="form-check-input" type="radio" name="status" value="0" >
				  	<label class="form-check-label" >Inactiva</label>
				 </div>
			</div>
			<button type="submit" class="btn btn-primary">Registrar</button>
		</form>
		
	</div>
</div>
<script type="text/javascript">
	$("#SubjectAddForm").validate({
        rules: {
            name: "required",
            reticle: "required",
            teacher_name: "required",
            hour_start: "required",
            hour_end: "required",
            max_students: "required"
        },
        messages: {
            name: "Requerido",
            reticle: "Requerido",
            teacher_name: "Requerido",
            hour_start: "Requerido",
            hour_end: "Requerido",
            max_students: "Requerido"
        }
    });
	
</script>