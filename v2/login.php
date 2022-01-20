<?php

require_once('FL/Seraphim.php');

$name = $_POST['username'];  
$price = $_POST['password'];
$return_page = $_POST['return'];

if (strlen($name) && strlen($price) > 0)
{
    if (strlen($return_page) == 0)
    {
        seraphim_createsess($name, $price, "/experimental/shop_handling/v2/shop.php");
    }
    else
    {
        seraphim_createsess($name, $price, $return_page);   
    }
}


?>

<html>
    
<form action="login.php" method="post" >
    <input name="username" type="text"></input>
    <input name="password" type="text"></input>
    <?php echo '<input name="return" type="hidden" value="'.$return_page.'"></input>';  ?>
    <input type="submit"></input>
</form>    

</html>