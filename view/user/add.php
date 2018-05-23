<div class="row">
	<div class="col">
		<h1>Nuevo usuario</h1>
	</div>
</div>
<?php
    include_once("view/template/messages.php");
?>
<div class="row">
	<div class="col">
		<form id="UserAddForm" action="index.php?sec=user&action=add" method="POST" role="form">
			<div class="form-group">
				<label for="name">Nombre</label>
				<input type="text" name="Name" id="Name" class="form-control"  placeholder="Nombre" value="<?php echo $_POST ? $_POST['name'] : ""?>">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="Email" id="Email" class="form-control" value="<?php echo $_POST ? $_POST['email'] : ""?>" placeholder="Email">
			</div>
			<div class="form-group">
				<label for="password">Contraseña</label>
				<input type="password" name="Password" id="Password" class="form-control" value="<?php echo $_POST ? $_POST['password'] : ""?>" placeholder="Contraseña">
			</div>
			<div class="form-group">
				<label for="password">Confirmar Contraseña</label>
				<input type="password" name="PasswordConf" id="PasswordConf" class="form-control" value="<?php echo $_POST ? $_POST['password_conf'] : ""?>" placeholder="Contraseña">
			</div>
            <div class="form-group">
				<label>Tipo de Usuario</label><br>
				
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="Profile" value="2" checked>
				  	<label class="form-check-label" for="exampleRadios1">Alumno</label>
				 </div>
			</div>
			
			
			<button type="submit" class="btn btn-primary">Registrar</button>
		</form>
		
	</div>
</div>
<script type="text/javascript">
	$("#UserAddForm").validate({
        rules: {
            Name: "required",
            Email: {
                required: true,
                email: true,
                remote: {
                    url: "index.php?sec=user&action=CheckExistEmail",
                    type: "post",
                    data: {
                        email: function() {
                            return $("#Email").val();
                        }
                    }
                }
            },
            Password: "required",
            PasswordConf: {
                required: true,
                equalTo: "#Password"
            }
        },
        messages: {
            Name: "Nombre es requerido",
            Email: {
                required: "Email es requerido",
                email: "El email es inválido"
            },
            Password: {
                required: "El password es requerido"
            },
            PasswordConf: {
                required: "Es necesario confirmar password",
                equalTo: "Los passwords deben coincidir"
            }
        }
    });
	
</script>