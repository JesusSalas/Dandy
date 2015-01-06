<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/styles.css" />
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Admin | Dandy</title>
        
    </head>
    <body>			
     				<?php echo form_open('login/index/'); ?>
                    <div id="login">
                        <div class="log_back">
                            <div class="log_tittle">
                                Log In
                            </div>
                            <div class="log_cont">
                                <table>
                                    <tr style="text-align: right;"><td><label>Usuario:</label></td><td><?php echo form_input(array('name' => 'Usuario', 'size' => '30', 'id' => 'Usuario')); ?></td><tr>
                                    <tr style="text-align: right;"><td><label>Contraseña:</label></td><td><?php echo form_password(array('name' => 'Password', 'size' => '30', 'id' => 'Password')); ?></td>
                                    <tr style="text-align: right;"><td colspan="2"><?php echo form_submit('login', 'Login'); ?></td></tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close();?>
                
    </body>
</html>