<?php

include("connect.php");

$mobile =$_POST["phone"] ;
$name =$_POST["username"] ;
/*
$password =md5($_POST["password"] );
$cpassword =md5($_POST["cpassword"] );
*/
$password =$_POST["password"] ;
$cpassword =$_POST["cpassword"] ;
$address =$_POST["address"] ;
$photo = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role =$_POST["role"] ;

echo$address;



if($password == $cpassword){
move_uploaded_file($tmp_name,"../uploads/$photo");

$insert= mysqli_query($connect,"INSERT INTO  voters (name,
                                    mobile,
                                    password,
                                    address,
                                    photo,
                                    role,
                                    status,
                                    votes) Values ('$name',
                                    '$mobile', 
                                    '$password',
                                    '$address',
                                    '$photo',
                                    '$role',
                                    0,
                                    0)");

    if($insert){
         echo '
     <script>
    alert( "Resigtration Successful");
    
   window.location ="../";
   
    </script>';
    }else{
 echo '
     <script>
    alert( "Resigtration UnSuccessful");
  window.location= "../routes/register.html";
    </script>';
    }

}else{
    echo '
     <script>
    alert( "Password doesnot match");
    window.location= "../routes/register.html";
    </script>';
}



?>