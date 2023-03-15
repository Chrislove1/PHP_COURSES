<?php 

// after starting the session u also destroy it.
session_start();
session_destroy();
header('location:login.php');


?>