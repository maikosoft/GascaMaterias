<?php
	include_once('view/template/messages.php');
?>
<div class="row">
	<div class="col">
		<form action="?sec=auth&action=index" method="POST" role="form" id="LoginForm">
			
			<div class="form-group">
				<label for="username">Email</label>
				<input type="text" name="email" class="form-control"  placeholder="Email" required>
			</div>
			<div class="form-group">
				<label for="password">Contraseña</label>
				<input type="password" name="password" class="form-control"  placeholder="Contraseña" required>
			</div>
			
			
			<button type="submit" class="btn btn-primary">Entrar</button>
		</form>
		
	</div>
</div>
<script>
$("#LoginForm").validate({
	rules: {
		email: "required",
		password: "required"
	},
	messages: {
		email: "Email es requerido",
		password: "Contraseña es requerida"
	}
});
</script>