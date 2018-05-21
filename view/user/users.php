<?php
// if (!isset($_SESSION['username'])) {
// 	header("Location: index.php?sec=login");
// 	exit();
// }
?>
<div class="row">
	<div class="col">
		<h1>Usuarios</h1>
	</div>
</div>
<div class="row">
	<div class="col">
	<!--
		<?php if (isset($_SESSION['error'])): ?>
			<div class="alert alert-danger" role="alert"><?php echo $_SESSION['error'] ?></div>
		<?php endif ?>
		<?php if (isset($_SESSION['success'])): ?>
			<div class="alert alert-success" role="alert"><?php echo $_SESSION['success'] ?></div>
		<?php endif ?>
		-->
	</div>
</div>
<div class="row">
	<div class="col">
		<?php if (!$users): ?>
			<div class="alert alert-danger" role="alert">Ningun usuario registrado</div>
		<?php else: ?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Usuario</th>
						<th>Teléfono</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $key => $user): ?>
						<tr>
							<td><?php echo $user['name'] ?></td>
							<td><?php echo $user['username'] ?></td>
							<td><?php echo $user['phone'] ?></td>
							<td>
								<a href="?sec=get&id=<?php echo $user['id'] ?>" class="btn btn-primary">Ver</a>
								<a href="?sec=edit&id=<?php echo $user['id'] ?>" class="btn btn-secondary">Editar</a>
								<a href="#" data-toggle="modal" data-target="#delete_confirm" class="btn btn-danger">Eliminar</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		<?php endif ?>

		
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar usuario?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       ¿Realmente desea eliminar éste usuaurio?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-defaul" data-dismiss="modal">No</button>
        <a href="?sec=delete&id=<?php echo $user['id'] ?>" class="btn btn-danger">Si, eliminar</a>
      </div>
    </div>
  </div>
</div>