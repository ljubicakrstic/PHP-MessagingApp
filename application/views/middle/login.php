
<div class="row justify-content-center">
    <div class="col-sm-5">
        <?php   echo form_open("Login/logovanje"); 
                echo form_fieldset( "Log In" );
                echo $err ?? "";
        ?>
        <div class="form-group row">
            <?php
                echo form_label( "Username", "username", array ( "class" => "control-label" ) );
                echo form_input( array ( "name" => "username", "class" => "form-control", "value" => set_value ( "username" ) ) );
                echo form_error ( "username" );
            ?>
        </div>
        <div class="form-group row">
            <?php
                echo form_label( "Password", "password", array ( "class" => "control-label" ) );
                echo form_password( array ( "name" => "password", "class" => "form-control" ) );
                echo form_error ( "password" );
            ?>
        </div>
        <div class="form-group row">
            <?php
                echo form_submit ( "login", "Log In" );
            ?>
        </div>
         <?php 
            echo form_fieldset_close();
            echo form_close(); 
        ?>
        <a href="<?php echo site_url("Registration")?>">Create acount!</a>
        <a href="<?php echo site_url("Login/logout")?>">Logout!!!</a>
    </div>
</div>