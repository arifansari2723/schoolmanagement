<?php
session_start();

include 'includes/dbcon.php';
include 'includes/header.php';
include 'includes/function.php';
$msg='';$msg2='';$msg3=''; $msg4='';$msg5=''; $msg6='';$msg7='';$msg8='';

$firstname='';$lastname='';$email='';$dob='';$image='';$checkbox='';
 if(isset($_POST['submit']) ){
   $firstname=mysqli_real_escape_string($conn,$_POST['fname']);
   $lastname=mysqli_real_escape_string($conn,$_POST['lname']);
   $email=mysqli_real_escape_string($conn,$_POST['email']);
   $dob=$_POST['dob'];
   $password=$_POST['pass'];
   $c_password=$_POST['cpass'];
   $image=$_FILES['image']['name'];
   $tmp_image=$_FILES['image']['tmp_name']; 
   $size_image=$_FILES['image']['size'];
   $checkbox=isset($_POST['check']);
   //echo $firstname."</br>".$lastname."</br>".$email."</br>".$dob."</br>".
   //$password."</br>".$c_password."</br>".$image."</br>".$checkbox;
   
   if (strlen($firstname) < 3 ){
     $msg="<div class='error'>First name must contain atleast 3 character !</div>";
   }
        else if (strlen($lastname) < 3 ){
        $msg2="<div class='error'>Last name must contain atleast 3 character !</div>";
    }

       

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $msg3="<div class='error'>Enter Valid Email !</div>";
 }
    else if (email_exists($email, $conn)) {
   $msg3="<div class='error'>Email already Exists !</div>";
}

      else if(empty($dob)){
       $msg4="<div class='error'>Please enter your date of birth !</div>";
     }

     else  if (empty($password)){
      $msg5="<div class='error'>Please enter the password !</div>";
   }

     else if (strlen($password) < 6){
      $msg5="<div class='error'>Password must contain atleast 6 character !</div>";
  }

  

    else  if ($password!==$c_password){
      $msg6="<div class='error'>Passwords are not matched !</div>";
   }
   
   else if ($image==''){
    $msg7="<div class='error'>Please Upload your profile image!</div>";
 }

  else if ($size_image>1048576){
   $msg7="<div class='error'>Please Upload image less then 1MB !</div>";
}

 else if ($checkbox==''){
  $msg8="<div class='error'>Please Agree our terms and conditions!</div>";
}

else{
  
   $img_ext=explode(".", $image);
   $image_ext= $img_ext['1'];
   $image=rand(1,10000).rand(1,10000).time().".".$image_ext;

    if($image_ext=='jpg' || $image_ext=='png' || $image_ext=='PNG' || $image_ext=='JPG'){

        move_uploaded_file($tmp_image, "C:/xampp/htdocs/img/$image");
        $insertquery="insert into registration (first_name,last_name,email,dob,password, image) 
        values ('$firstname','$lastname','$email','$dob','$password','$image')";
  
        $query=mysqli_query($conn,$insertquery);
        $firstname='';$lastname='';$email='';$dob='';$image='';$checkbox='';

          if($query){
          ?>
   
          <script>
                alert('You are succesfully registered !');
                window.location = "signup.php";
          </script>
         <?php
  
           }
          }
          else{
            $msg7="<div class='error'>Please Upload a image file !</div>";
          } 
        
  }

 }

?>




<!DOCTYPE html>
<html lang="en">
 <head>
     <style>
       .error{
        color: red;
        }
        .succes{
          color:green;
          font-weight:bold;
        }
     </style>

    <title>Signup</title>
  </head>
  <body  style="background: linear-gradient(to right, #eb1c95, #1565c0)">
  <br><br><br><br>

   <div class="container mt-2 ">
        <nav class="navbar navbar-expand-sm navbar-light  bg-#00BFFF rounded fixed-top navbarshadow " 
             style="background: repeating-linear-gradient( to right,violet , indigo, blue, 
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
                                       
                     <!--Icon for home button-->

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

                 
                  <li class="nav-item"><a href="#" class="nav-link"><b>Gallery</b></a></li>
                  <li class="nav-item"><a href="#" class="nav-link"><b>Contact</b></a></li>
                  <li class="nav-item dropdown1"><a href="#" class="nav-link"><b>Login</b></a>
                    <div class="dropdown1-content">
                      <a href="login.php">For Teacher</a>
                      <a href="login.php">For Students</a>
                      </div>
                  </li>
                </ul>
            </div>
             
        </nav>
      </div> 

     <div class="container">
       <div class="login-form col-md-4 offset-md-4">
         <div class="jumbotron" style="margin-top:100px;padding-top:20px;padding-bottom:10px;">
            <h3 align="center">Sign Up Form</h3>
           
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
            
            <div class="form-group"><br>
            <label> First Name :</label>
            <input type="text" name ="fname" placeholder="Your First Name"  value ='<?php echo $firstname; ?>' class= "form-control"/>
            <?php echo $msg;?>
            </div>
            <div class="from-group">
            <label> Last Name :</label>
            <input type="text" name ="lname" placeholder="Your Last Name"   value ="<?php echo $lastname; ?>" class= "form-control"/>
            <?php echo $msg2;?>
            </div>
            <div class="from-group">
            <label> E-mail :</label>
            <input type="email" name ="email" placeholder="Enter Your Email"  value ="<?php echo $email; ?>"  class= "form-control"/>
            <?php echo $msg3;?>
            </div>
            <div class="from-group">
            <label> Date of Birth :</label>
            <input type="date" name ="dob"  value ="<?php echo $dob; ?>" class= "form-control"/>
            <?php echo $msg4;?>
            </div>
            <div class="from-group">
            <label> Password :</label>
            <div class="input-group">
            <input type="password" id="password-field" name ="pass" placeholder="Password"  class= "form-control" />
            <div class="input-group-append">
            <div class = "input-group-text" ><i id="pass-status" class="fa fa-eye" onclick="viewPassword()" aria-hidden="true" ></i></div>
            </div>
            </div>
            <?php echo $msg5;?>
            </div> 
            <div class="from-group">
            <label> Conform Password :</label>
            <div class="input-group">
            <input type="password" id="password-field2" name ="cpass" placeholder="Re-Enter Password" class= "form-control"/>
            <div class="input-group-append">
            <div class = "input-group-text" ><i id="pass-status2" class="fa fa-eye" onclick="viewPassword2()" aria-hidden="true" ></i></div>
            </div>
            </div>
            <?php echo $msg6;?>  
          </div><br>
            <div class="from-group">
            <label> Profile Image :</label>
            <input type="file" name ="image" value ="<?php echo $image; ?>"/>
            <?php echo $msg7;?> 
            </div><br>
            <div class="from-group">
            <input type="checkbox" name ="check" value ="<?php echo $checkbox; ?>" />
            &nbsp; I Agree the terms and conditions.
            <?php echo $msg8;?> 
            </div><br>
            <center><input type="submit" name ="submit" value="Sign Me Up" class= "btn-primary"/></center><br>
           <center> <p class="text-muted">Have an Account? &nbsp;<a class="forgot text-muted" href="login.php">Login</a</p></center>
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

             function viewPassword2(){
               var passwordInput = document.getElementById('password-field2');
               var passStatus = document.getElementById('pass-status2');
 
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
