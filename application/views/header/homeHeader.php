<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        
        <?php 
        $ime=$this->session->userdata('user')['forename'];
        $prezime=$this->session->userdata('user')['surname'];
        ?>
        
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?php echo site_url("Home")?>"><?php echo $ime." ".$prezime;?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item <?php if (isset($tip) and $tip=='conv') echo 'active'?>">
                      <a class="nav-link" href="<?php echo site_url("Home/messages")?>">Conversations <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item <?php if (isset($tip) and $tip=='conv') echo 'active'?>">
                      <a class="nav-link" href="<?php echo site_url("Home/users")?>">All users <span class="sr-only">(current)</span></a>
                  </li>
                </ul>
              </div>
            
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo site_url("Login/logout")?>">Logout</a>
                    </li>
                </ul>
              </div>
        </nav>
