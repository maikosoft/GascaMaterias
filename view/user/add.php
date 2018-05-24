<div class="row">
	<div class="col">
		<h1>Nuevo usuario</h1>
	</div>
</div>
<?php
    include_once("view/template/messages.php");
    include_once("view/user/menu.php");
?>
<div class="row">
	<div class="col">
		<form id="UserAddForm" action="index.php?sec=user&action=add" method="POST" role="form">
			<div class="form-group">
				<label for="name">Nombre</label>
				<input type="text" name="name" id="name" class="form-control"  placeholder="Nombre" value="<?php echo $_POST ? $_POST['name'] : ""?>">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="email" id="email" class="form-control" value="<?php echo $_POST ? $_POST['email'] : ""?>" placeholder="Email">
			</div>
			<div class="form-group">
				<label for="password">Contraseña</label>
				<input type="password" name="password" id="password" class="form-control" value="<?php echo $_POST ? $_POST['password'] : ""?>" placeholder="Contraseña">
			</div>
			<div class="form-group">
				<label for="password">Confirmar Contraseña</label>
				<input type="password" name="password_conf" id="password_conf" class="form-control" value="<?php echo $_POST ? $_POST['password_conf'] : ""?>" placeholder="Contraseña">
			</div>
            <div class="form-group">
				<label>Tipo de Usuario</label><br>
				
				<div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="profile" value="1">
				  	<label class="form-check-label" >Maestro</label>
					<input class="form-check-input" type="radio" name="profile" value="2" checked>
				  	<label class="form-check-label" >Alumno</label>
				 </div>
			</div>
			
			
			<button type="submit" class="btn btn-primary">Registrar</button>
		</form>
		
	</div>
</div>
<script type="text/javascript">
	$("#UserAddForm").validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true,
                remote: {
                    url: "index.php?sec=user&action=CheckExistEmail",
                    type: "post",
                    data: {
                        email: function() {
                            return $("#email").val();
                        }
                    }
                }
            },
            password: "required",
            password_conf: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            name: "Nombre es requerido",
            email: {
                required: "Email es requerido",
                email: "El email es inválido",
                remote: "Email ya existe"
            },
            password: {
                required: "El password es requerido"
            },
            password_conf: {
                required: "Es necesario confirmar password",
                equalTo: "Los passwords deben coincidir"
            }
        }
    });
	
</script>