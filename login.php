<?php
session_start();
include "includes/dbcon.php";
include "includes/header.php";
include "includes/function.php";
$msg='';$msg2='';$email='';
if(isset($_POST['submit'])){
  $email=$_POST['email'];
  $password=$_POST['pass'];
  if(empty($email)){
    $msg="<div class='error'>Please enter your email</div>";
  }
  else if(empty($password)){
    $msg2="<div class='error'>Please enter your password</div>";
  }
  else if(email_exists($email,$conn)){
    $pass=mysqli_query($conn, "select password from registration where email='$email'");
    $pass_w= mysqli_fetch_array($pass);
    $dpass=$pass_w['password'];
  
    if ($password==$dpass){
      ?>
   
      <script>
           
            window.location = "admission_form.php";
      </script>
     <?php
    }
    else{
      $msg2="<div class='error'>Password is Wrong!</div>";
     
    }
    
  }

  else{
    $msg="<div class='error'>Email Dosn't Exist !</div>";
  }
}

?>
<html>
  <head>
     <meta chars et="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title> login</title>
    <style>
       .error{
        color: red;
        }
        .succes{
          color:green;
          font-weight:bold;
        }
     </style>
  </head>
  <body  style="background: linear-gradient(to right, #eb1c95, #1565c0)">
 


  <div class="container mt-2 ">
          <nav class="navbar navbar-expand-sm navbar-light  bg-#00BFFF rounded fixed-top navbarshadow " 
               style="
               background: repeating-linear-gradient( to right,                 violet , indigo, blue, 
                 green, yellow, orange, red);">
              <span class="navbar-text">
              
                <img src="images/logorar.png" width="150px" height="50px" >
             
              </span>
               <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" 
               data-target="#myMenu" aria-controls="myMenu" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
              </button>
              
              <div class="collapse navbar-collapse" id="myMenu">
                  <ul class="navbar-nav textsize menu-bar ml-auto">
                    <li class="nav-item active "><a href="index.php" class="nav-link">
                                         
                       <!-- Icon for home button-->

                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill mb-2 mr-2 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                        <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                      </svg> 

                   <b> Home</b></a>
                  
                    </li>

                    
                    <li class="nav-item dropdown1"><a href="javascript:void(0)" class="nav-link  dropbtn"><b>Academics</b></a>
                  
                      <div class="dropdown1-content">
                      <a href="123.html" class=""> Our Toppers 2018-19 </a>
                       <a href="#" class="">Our Star Rating Students</a>
                       <a href="#" class="">Most Regular Students</a>
                       <a href="#" class="">Academics House</a>
                       <a href="#" class="">Academics Club</a>
                       <a href="#" class="">Teachers Profile</a>
                       <a href="#">Fee Structure 2019-20</a>
                       <a href="#"> NCERT Book List 2019-20 </a>          
                      </div>
                    
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link"><b>Facilities</b></a></li>
                    <li class="nav-item  dropdown1"><a href="#" class="nav-link dropbtn"><b>Activities</b></a>
                      <div class="dropdown1-content">
                      <a href="#">Latest Events</a>
                      <a href="#">Sweep Stakes</a>
                      <a href="#">Commemoration &amp; Jubilation</a>
                      <a href="#">Our  Events</a>
                      <a href="#">Our Combined Venture</a>
                      </div>
                    
                    </li>
 
                  
                    <li class="nav-item"><a href="#" class="nav-link"><b>Gallery</b></a> </li>
                    <li class="nav-item"><a href="#" class="nav-link"><b>Contact</b></a></li>
                    <li class="nav-item dropdown1"><a href="#" class="nav-link"><b>Login</b></a>
                      <div class="dropdown1-content">
                        <a href="login.php">Teacher</a>
                        <a href="login.php">Students</a>
                        </div>
                    </li>
                  </ul>
              </div>
               
          </nav>
        </div>
        
      <div class="container">
       <div class="login-form col-md-4 offset-md-4">
         <div class="jumbotron" style="margin-top:100px;padding-top:20px;padding-bottom:10px">
            <h3 align="center">Login</h3><br>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
            <div class="from-group">
            <label><b> E-mail :</b></label>
            <input type="email" name ="email" placeholder="Enter Your Email" class= "form-control" value ="<?php echo $email; ?>"/>
            <?php echo $msg;?>
            </div>
            <div class="from-group">
            <label><b> Password :</b></label>
            <div class="input-group">
            <input type="password" id="password-field" name ="pass" placeholder="Password"   class= "form-control" />
            
            <div class="input-group-append">
            <div class = "input-group-text" ><i id="pass-status" class="fa fa-eye" onclick="viewPassword()" aria-hidden="true" ></i></div>
            </div>
           
            </div>
            <?php echo $msg2;?>
            </div>  <br>
            <div class="from-group">
            <input type="checkbox" name ="check"/>
            &nbsp; Keep me Logged in.
            </div><br>
            <center> <p class="text-muted"><a class="forgot text-muted" href="#">Forgot Password ?</a></p></center><br>
            <center><input type="submit" name ="submit" value="Login" class= "btn-primary"/></center>
            <br>
           <center> <p class="text-muted">Doesn't have an Account? &nbsp;<a class="forgot text-muted" href="signup.php">Signup</a</p></center>
          </form>
         </div>
       </div>


     </div>
     <script>
              function viewPassword(){
               var passwordInput = document.getElementById('password-field');
               var passStatus = document.getElementById('pass-status');
 
               if (passwordInput.type == 'password'){
                    passwordInput.type='text';
                    passStatus.className='fa fa-eye-slash';
    
               }
               else{
                  passwordInput.type='password';
                  passStatus.className='fa fa-eye';
               }
             }
             </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" 
                integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </div>
  </body>
</html>
