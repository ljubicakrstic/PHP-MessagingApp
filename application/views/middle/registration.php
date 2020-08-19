<div class="row justify-content-center">
    <div class="col-sm-5">
        <?php   echo form_open(
                    "Registration/register"
                ); 
                echo form_fieldset( "Registration" );
        ?>
        <div class="form-group row">
            <?php
                echo form_label( "Forename", "forname", array ( "class" => "control-label" ) );
                echo form_input( array ( "name" => "forename", "class" => "form-control", "value" => set_value ( "forename" ) ) );
                echo form_error ( "forename" );
            ?>
        </div>
        <div class="form-group row">
            <?php
                echo form_label( "Surname", "surname", array ( "class" => "control-label" ) );
                echo form_input( array ( "name" => "surname", "class" => "form-control", "value" => set_value ( "surname" ) ) );
                echo form_error ( "surname" );
            ?>
        </div>
        <div class="form-group row">
            <?php
                echo form_label( "Email", "email", array ( "class" => "control-label" ) );
                echo form_input( array ( "name" => "email", "class" => "form-control", "value" => set_value ( "email" ) ) );
                echo form_error ( "email" );
            ?>
        </div>
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
                echo form_password ( array ( "name" => "password", "class" => "form-control" ) );
                echo form_error ( "password" );
            ?>
        </div>
        <div class="form-group row">
            <?php
                echo form_label( "Password confimation", "passwordConfirmation", array ( "class" => "control-label" ) );
                echo form_password ( array ( "name" => "passwordConfirmation", "class" => "form-control" ) );
                echo form_error ( "passwordConfirmation" );
            ?>
        </div>
        <div class="form-group row">
            <?php
                echo form_label( "Date of birth", "dateOfBirth", array ( "class" => "control-label" ) );
                echo form_input ( array ( "name" => "dateOfBirth", "class" => "form-control", "type" => "date", "value" => set_value ( "dateOfBirth" ) ) );
                echo form_error ( "dateOfBirth" )
            ?>
        </div>
        <div class="form-group row">
            <?php
                echo form_submit ( "register", "Register" );
            ?>
        </div>
        <?php 
            echo form_fieldset_close();
            echo form_close(); 
        ?>
    </div>
</div>