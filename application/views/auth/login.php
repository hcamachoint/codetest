<div class="card">
	<div class="card-header">
		<h1>Login Page</h1>
	</div>

	<div class="card-body">
        <?php echo '<label class="text-success">'.$this->session->flashdata("success").'</label>'; ?>
        <?php echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>'; ?>
		<form method="post" action="<?php echo base_url(); ?>auth/login_validation">
            <div class="form-group">
                <input type="text" name="email" placeholder="Email">
                <span><?php echo form_error('email'); ?></span>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password">
                <span><?php echo form_error('password'); ?></span>
            </div>
            <div class="form-group">
                <input type="submit" name="send" value="Send">
                
            </div>            
        </form>
	</div>

	<div class="card-footer">
		<strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
	</div>	
</div>