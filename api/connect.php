<?php

$connect= mysqli_connect("localhost","root","",
"users",)or die("Could not connect");

if($connect){
    echo"connected<br>";
}else{
    echo "could not connect<br>";
}
?>