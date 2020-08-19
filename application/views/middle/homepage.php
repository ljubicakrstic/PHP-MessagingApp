
<!DOCTYPE html>


<div class="container-fluid">
    <div class="levo">
        
        <div class="img">  
            <?php if($userData[0]['photo'] == NULL){?>
            <img src="<?php echo base_url();?>/photos/profile_image.png" class="img-fluid">
            <?php } else if(file_exists("./photos/".$this->session->userdata('user')['idUser'].'/'.$userData[0]['photo'])) {?>
            <img src="<?php echo base_url().'/photos/'.$this->session->userdata('user')['idUser'].'/'.$userData[0]['photo']?>" class="img-fluid">
            <?php } $user=$this->session->userdata('user');?>
        </div>
        <a class="btn" href="<?php echo site_url("User/preuzmi")?>"><i class="fa fa-download"></i> Download</a>
        <?php echo form_open_multipart('User/dodaj', 'method=post');
                echo $error ?? "";
                ?>
                
        <input type="file" name="slika" size="20">
        <?php
                echo form_submit('dodaj', 'Dodaj');
                echo form_close();
                ?>
        <div class="user-info"> 
            <?php 
            if($this->input->get('edit')){ 
            ?>
           
            <form name="editForm" method="POST" action="<?php echo site_url("User/editdata")?>">
            <div class="user-data">
            <span class="txt">Username: </span>
                <input type="text" name="user" value="<?php echo $userData[0]['username']?>">
                <input type="hidden" name="actual_username" value="<?php echo $userData[0]['username']?>">
            </div>
            <div class="user-data">
            <span class="txt">Email: </span>
                <input type="email" name="email" value="<?php echo $userData[0]['email']?>">
            </div>
            <div class="user-data">
            <span class="txt">Date of birth: </span>
                <input type="date" name="date" value="<?php echo $userData[0]['dateOfBirth']?>">
            </div>
            <div class="user-data">
                <input type="submit" name="edit" value="Save changes" class="btn btn-primary">
            </div>
            </form>
            
                
            <?php }else{ ?>
            
            <div class="user-data">
            <span class="txt">Username: </span>
            <?php echo $userData[0]['username']?>
            </div>
            <div class="user-data">
            <span class="txt">Email: </span>
            <?php echo $userData[0]['email']?>
            </div>
            <div class="user-data">
            <span class="txt">Date of birth: </span>
            <?php echo $userData[0]['dateOfBirth']?>
            </div>
            <div class="edit"><a href="<?php echo site_url("Home")?>?edit=1">Edit user data</a></div>
            <?php }?>
        </div>
    </div>
    <div id="sveSlike" class="col-sm-4 offset-4">
        <?php echo form_open_multipart('User/novaSlika', 'method=post');
                //var_dump($this->session);
         ?>
                
        <input type="file" name="nova" size="20">
    <?php
                echo form_submit('dodaj', 'Dodaj');
                echo form_close();
                
                $id= $this->session->userdata('user')['idUser'];
                if(is_dir('photos/'.$id)){
                $dir= './photos/'.$id;
                $allPhotos= scandir($dir);
                $onlyPhotos = array_diff($allPhotos, array('.', '..'));
                //var_dump($onlyPhotos);
                foreach($onlyPhotos as $onePhoto){ 
                    if($onePhoto != $userData[0]['photo']){
                    
    ?>
        <div class="photos">
                <img class="img img-fluid" src="<?php echo base_url().'/'.$dir.'/'.$onePhoto?>">
                <a class="btn" href="<?php echo site_url("User/obrisi/$onePhoto")?>" onClick="javascript:return confirm('Da li zelite da obrisete sliku?');">Obrisi</a>
        </div>
            <?php
                        }
                    }
                }
            ?>

    </div>
    
</div> 

<script>
            function deleletconfig(){

            var del=confirm("Da li zelite da obrisete sliku?");
            if (del===true){
               alert ("Obrisano!");
            }
            return del;
            }
</script>
        
       
        <?php
        echo validation_errors();
      //$podaci= $this->session->userdata('user')['username'];
      //echo $podaci;
      
      //var_dump($this->session);
        ?>
