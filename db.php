<?php
//created by Robert Anthonie C. Soriano
// https://www.facebook.com/ThatixSC2
$username = 'root';
$password = '';
$db = "inventory";
try {
    $conn = new PDO('mysql:host=localhost;dbname='.$db.'', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>