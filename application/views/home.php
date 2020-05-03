<div class="card">
	<div class="card-header">
		<h1>Welcome <?php echo print_r($_SESSION['email'], TRUE); ?> / <?php echo print_r($_SESSION['id'], TRUE); ?></h1>
	</div>

	<div class="card-body">
	<p>This is a home page</p>
	</div>

	<div class="card-footer">
		<strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
	</div>	
</div>