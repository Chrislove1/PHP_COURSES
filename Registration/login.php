<?php
//to make it show success
$login=0;
$invalid=0;
/* this is use to pass the data using POST to the server and it will show connection successful once it connect to the database*/
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
  
    /*creating a variable for username and password on the server with the username attribute */
    $username=$_POST['username'];
    $password=$_POST['password'];

   // whatever a username enter it will be store inside the variable
   // * meanig select all the data from the regisration table
   $sql="select * from registration where username='$username' and password='$password'";

   // to check if the info enter is correct and excuted and also store the result in the variable
   // @ num>0 to make sure no other person with the same id.
   $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            // session_start are use to keep our website ruinning
            // $_session is use to store the usernme and pwd
            // header direct the user to the home page
            $login=1;
            session_start();
            $_SESSION['username']=$username;
            header('location:home.php');
            //echo "login successful";
        }else{
            $invalid=1;
            
            //echo "Invalid Data";
           
        }
   }
}

?>



<!doctype html>
<html lang>
  <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">

        <title>Login Page</title>
  </head>
  <body>

            <?php
            if($login){
                echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> loggned  in successful !!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            ?>

            <?php
            if($invalid){
                echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!!</strong> Invalid credentials !!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            ?>

        <h1 class="text-center">Login to our website</h1>
            <div class="container mt-5">
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="Enter your username" name="username">
                        
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter your password
                        " name="password">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
        </div>
        </div>
        </div>  
  </body>
</html>
