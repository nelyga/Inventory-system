<?php
require 'db.php';
$message = '';
if (isset ($_POST['fname'])  && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = 'INSERT INTO user(fname,lname,email,password) VALUES(:fname, :lname, :email, :password)';
  $statement = $conn->prepare($sql);
  if ($statement->execute([':fname' => $fname, ':lname' => $lname, ':email' => $email, ':password' => $password])) {
    $message = 'data inserted successfully';
    header ('Location: userlogin.php');
   
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
    <form method="post" action="">
        <H2>create account</H2>
        
        Firstname:<input type="text" name="fname"><br>
        Lastname:<input type="text" name="lname"><br>
        Email:<input type="email" name="email"><br>
        password:<input type="password" name="password"><br><br>
        <input type="submit" name="login" value="create">
    </form>

</body>
</html>