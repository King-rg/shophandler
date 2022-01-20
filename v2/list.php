<?php

require_once('FL/Arch.php');
require_once('FL/Seraphim.php');

$current_page = $_SERVER['REQUEST_URI'];

seraphim_handle($current_page);

$name = $_POST['name'];  
$price = $_POST['price'];


if (strlen($name) && strlen($price) > 0)
{
    arch_create($name, $price);
}


?>

<html>
    
<form action="list.php" method="post" >
    <input name="name" type="text"></input>
    <input name="price" type="text"></input>
    <input type="submit"></input>
</form>    

</html>