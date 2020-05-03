<div class="card">
	<div class="card-header">
		<h1>Register Page</h1>
	</div>

	<div class="card-body">
		<form method="post" action="<?php echo base_url(); ?>auth/register_validation">
            <div class="form-group">
                <input type="text" name="email" placeholder="Email">
                <span class="text-danger"><?php echo form_error('email'); ?></span>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password">
                <span class="text-danger"><?php echo form_error('password'); ?></span>
            </div>
            <div class="form-group">
                <input type="password" name="password_confirm" placeholder="Password confirmation">
                <span class="text-danger"><?php echo form_error('password_confirm'); ?></span>
            </div>
            <div class="form-group">
                <input type="submit" name="send" value="Send">
                <?php echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>'; ?>
            </div>            
        </form>
	</div>

	<div class="card-footer">
		<strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
	</div>	
</div>