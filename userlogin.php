<?php
session_start();
 require 'db.php';
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = 'SELECT * FROM user where email=:email AND password=:password';
$statement = $conn->prepare($sql);
$statement->execute(['email' => $email,'password' => $password ]);
$login = $statement->rowCount();
if ($login > 0) {
    $_SESSION['user']=$_POST['email'];
    header("Location: index1.php");
} else {
  
    header("Location: create.php");
}

}
   
   ?>
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
</head>
<body>
    <form method="post" action="userlogin.php">
        <H3>User Login</H3>
      
        Email:<br><input type="email" name="email"><br>
        Password:<br><input type="password" name="password"><br><br>
        <input type="submit" name="login" value="Login">
    </form>

</body>
</html>
