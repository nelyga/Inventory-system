<?php
session_start();
 require 'db.php';
if(isset($_POST['login'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $sql = 'SELECT * FROM admin where name=:name AND password=:password';
$statement = $conn->prepare($sql);
$statement->execute(['name' => $name,'password' => $password ]);
$login = $statement->rowCount();
if ($login > 0) {
    $_SESSION['admin']=$_POST['name'];
    header("Location: index.php");
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
    <form method="post">
        <H2>Admin Login</H2>
        <?php 
        if (isset($_GET['error'])) {
           echo "Wrong Password And Username<br>";
        }
        ?>
        UserName:<br><input type="text" name="name"><br>
        Password:<br><input type="password" name="password"><br><br>
        <input type="submit" name="login" value="Login">
        
    </form>

</body>
</html>