<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="offset-4 col-4">
            <form name="brRedova" method="POST" action="<?php echo site_url("Home/users")?>">
            <select name="br" onchange='this.form.submit()'>
                <option value="5" <?php if($this->session->userdata('broj')!== null && $this->session->userdata('broj')==5) echo 'selected';?>>5</option>
                <option value="10" <?php if($this->session->userdata('broj')!== null && $this->session->userdata('broj')==10) echo 'selected';?>>10</option>
                <option value="15" <?php if($this->session->userdata('broj')!== null && $this->session->userdata('broj')==15) echo 'selected';?>>15</option>
            </select>
            </form>
            <h2>All users</h2>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="table-primary">
                      <th>Username</th>
                      <th>Email</th>    
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user){ ?>
                    <tr>
                         <th><?php echo $user['username']?></th>
                         <th><?php echo $user['email']?></th>
                    </tr>


                    <?php 
                    }
                    ?>
                </tbody>
        </table>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </body>
</html>
