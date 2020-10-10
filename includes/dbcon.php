<?php
 $server= "localhost:3306";
    $user = "root";
    $password = "";
    $db = "signup";
    
    $conn = mysqli_connect ($server, $user, $password, $db);
 if($conn){
       ?>
         <script>
               alert('Connection Succesfull!');
         </script>
   <?php
 }else{

      ?>
      <script>
       alert('Connection Unsuccesfull!');
          </script>
       <?php
   }
    
?>