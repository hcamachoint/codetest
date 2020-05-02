<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document | <?php echo $title; ?></title>
</head>
<body>
    <div>
        <h2>Register Page</h2>
        <form method="post" action="<?php echo base_url(); ?>auth/register_validation">
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
                <?php echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>'; ?>
            </div>            
        </form>
    </div>
</body>
</html>