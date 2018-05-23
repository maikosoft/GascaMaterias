<div class="row">
	<div class="col">
	
		<?php if (isset($_SESSION['error'])): ?>
			<div class="alert alert-danger" role="alert"><?php echo $_SESSION['error'] ?></div>
		<?php endif ?>
        <?php if (isset($_SESSION['success'])): ?>
			<div class="alert alert-success" role="alert"><?php echo $_SESSION['success'] ?></div>
		<?php endif ?>
	</div>
</div>