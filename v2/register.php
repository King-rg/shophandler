<?php

require_once('FL/Seraphim.php');

$username = $_POST['username'];  
$password = $_POST['password'];


if (strlen($username) && strlen($password) > 0)
{
    seraphim_createacc($username, $password);
}


?>

<html>


<form action="register.php" method="post" >
    <input name="username" type="text"></input>
    <input name="password" type="text"></input>
    <input type="submit"></input>
</form>    


</html>