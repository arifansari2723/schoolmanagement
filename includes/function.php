<?php
function email_exists($email,$conn){

    $row=mysqli_query($conn, "select * from registration where email='$email'");
    //print_r( $row);
    {
   
        if(mysqli_num_rows($row)==1){
            return true;
        }
        else{
            return false;
        }
    }
}
?>