<?php

require_once "config.php";

$conn = new mysqli($hn,$un,$pw,$db);
    if($conn->connect_error) die("Fatal error");

if(isset($_POST['teamname']) && isset($_POST['username']) && isset($_POST['password'])) {
    $teamname = get_post($conn, 'teamname');
    $username = get_post($conn, 'username');
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $id = NULL;

    $query = "INSERT INTO user (id,teamname,username,password) VALUES " . "(NULL,'$teamname','$username','$password')";

    $stmt = $conn->prepare('INSERT INTO user VALUES(?,?,?,?)');
    $stmt->bind_param('isss',$id,$teamname,$username,$password);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    header('Location: signin.html');

}

function get_post($conn,$var) {
    $var = htmlentities($_POST[$var]);

    if(get_magic_quotes_gpc()) {
        $var = stripslashes($var);
    }

    return $conn->real_escape_string($var);
}

 ?>