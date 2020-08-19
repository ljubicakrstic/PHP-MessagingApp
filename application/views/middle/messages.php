<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
        <div class="container-fluid">
            <div class="levo overflow-auto">  
                <?php
                foreach ($poruke as $poruka){
                    $idConversation= $poruka['idConversation'];
                    echo "<div class='nazivi'><a href='#' onclick='poruke($idConversation)'>".$poruka['name']."</a></div><br/>";
                }
                ?>
            </div>
            <div id="desno"> 
                <div class="forma form-inline"> 
                    <input type="text" name="porukica" id="msg" class="form-control" placeholder="Type a message..">
                    <input type="button" name="Posalji" value="Posalji" onclick="dodaj(); cleartext()" id="btn" class="btn btn-primary">
                </div>
                <div id="message" class="overflow-auto">
                   
                </div>
            </div>
            
        </div>
        <script>   
           function poruke(id){
            xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(this.readyState==4&&this.status==200){
                    document.getElementById("message").innerHTML=this.responseText;
                    document.get;
                    
                }
            };
            xmlhttp.open("GET", "<?php echo site_url('Home/allmessages')?>?id=" + id, true);
            xmlhttp.send();   
            }
            
            function dodaj (){
            var msg=document.getElementById("msg").value;
            var idc=document.getElementById("idc").value;
            xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function(){
                if(this.readyState==4&&this.status==200){
                    document.getElementById("message").innerHTML=this.responseText;
                }
            }
            xmlhttp.open("GET", "<?php echo site_url('Home/sendmessage')?>?msg=" + msg + "&idc=" + idc, true);
            xmlhttp.send();   
            
            }
            //ovo ispod je kod nevezan za ajax, svrha mu je da se poruka posalje 
            //klikom na enter, da ne mora dugme da se pritiska
            document.getElementById("msg").addEventListener("keyup", function(event) {
                    event.preventDefault();
                        if (event.keyCode === 13) {
                     document.getElementById("btn").click(); 
    }
});


        //a ovo je funkcija da se poruka izbrise iz input polja nakon sto je posaljemo

        function cleartext(){
            document.getElementById("msg").value= '';
        }
        </script>
    </body>
</html>
