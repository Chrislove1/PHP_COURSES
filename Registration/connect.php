<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='signupform';

$con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

// ! it means is not connected show error
if(!$con){
    die(mysqli_error($con));
}

    // if the server is connected it will show the msg successful
    //if($con){
    //  echo "connection successful";
    //}else{
    //  die(mysqli_error($con));
    //}
?>