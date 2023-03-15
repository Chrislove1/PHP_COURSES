<?php
//to make it show success
$success=0;
$user=0;
/* this is use to pass the data using POST to the server and it will show connection successful once it connect */
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
  
    /*creating a variable for username and password on the server with the username attribute */
    $username=$_POST['username'];
    $password=$_POST['password'];

    // how to hash a password
    //$hashed_password= password_hash($password, PASSWORD_DEFAULT);

     /*to insert a query and get all the info the user is filling */
    //$sql="insert into registration (username,password) values('$username','$password')";
    /*to excute the query */
    //$result=mysqli_query($con,$sql);

    /* to check if the info insert is correct */
   // if($result){
        //echo "Data insert successfully";
     
    //}else{
      //  die(mysqli_error($con));
   // }

   // whatever a username enter it will be store inside the variable
   $sql="select * from registration where username='$username'";

   // to check if the info enter is correct and excuted and also store the result
   // @ num>0 to make sure no other person with the same id.
   $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            //echo "User already exist";
           $user=1;
            // if the user dnt exist create the user new data
            /* passing the hash_password as a parameter */
            // $sql="insert into registration (username,password) values('$username','$hashed_password')";
        }else{
            $sql="insert into registration (username,password) values('$username','$password')";
            $result=mysqli_query($con,$sql);
        } // if ur query is successfull it will show the result
        if($result){
              //echo "Signup successfully";
            $success=1;
            header('location:login.php');
        }else{
            die(mysqli_error($con));
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

    <title>Signup Page</title>
  </head>
  <body>
<!----if the user exist it will show this alert warming/ how to set alert--->
<?php
if($user){
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>sorry!</strong> User already exist !!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>

<?php
if($success){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success !!</strong> you have successfully signed up !!!  !!.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>

  <h1 class="text-center">Signup Page</h1>
    <div class="container mt-5">
        <form action="sign.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter your username" name="username">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password
                " name="password">
            </div>

            <button type="submit" class="btn btn-primary w-100">Sign in</button>
        </form>
    </div>
    </div>

    </div>
  </body>
</html>
