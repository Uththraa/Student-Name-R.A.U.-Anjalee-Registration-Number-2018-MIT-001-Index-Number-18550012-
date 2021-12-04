<?php
   session_start();
   
   if(!empty($_SESSION['LoginStatus'])){
     echo '<script>window.location.href="index.php"; </script>';  
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>ESEB Information System</title>
      <?php include('common/styles.html'); ?>
   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <div class="card card-outline card-secondary">
            <div class="card-header text-center">
               <a href="sign-in.php" class="h2">ESEB Information System</a>
            </div>
            <div class="card-body">
               <p class="login-box-msg">Sign in to start your session</p>
               <form id="Signin_form_submit" method="post">
                  <label id="Signin_Username_lbl">Username</label>
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" placeholder="Username" name="Signin_Username_txt" id="Signin_Username_txt">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-user"></span>
                        </div>
                     </div>
                  </div>
                  <label Signin_Password_lbl>Password</label>
                  <div class="input-group mb-3">
                     <input type="password" class="form-control" placeholder="Password" name="Signin_Password_txt" id="Signin_Password_txt">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-4">
                        <button type="button" class="btn btn-primary btn-block" id="btn_sub">Sign In</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   </body>
</html>
<script>
   $(document).ready(function() {
       $("#btn_sub").click(function(){
       var Username = $('#Signin_Username_txt').val();
       var Password = $('#Signin_Password_txt').val();
   
       $.ajax({
       type: 'POST',
       url: "process/LoginProcess.php",
       data:{Signin_Username_txt:Username,Signin_Password_txt:Password},
       beforeSend: function(){
        
       },
       success: function(data){
         var jsonobj = JSON.parse(data);
         if(jsonobj.status == true){

           if(jsonobj.user_type == '1'){
             window.location.href="index.php";
           }
           else if(jsonobj.user_type == '4'){
             window.location.href="hod-viewTransfer.php";
           }
           else if(jsonobj.user_type == '5'){
             window.location.href="indexAdmin.php";
           }
           else{
             window.location.href="index2.php";
           }  

         }else{

           alert(jsonobj.message);
         }
       }
     });
     }); 
   });
</script>
