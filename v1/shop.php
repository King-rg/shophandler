<?php

//This is a concept system with hardcoded values that can only be used to make future versions of a cart system. 

$action = $_POST['action'];

function cookies_enabled()
{
    if (count($_COOKIE) == 0)
    {
        echo 'Cookies are not enabled on this site! Please enable them or we will not be able to take your order!';
    }
}

function check_cart()
{
    if ($_COOKIE['cart'] == 0)
    {
        return FALSE;
    }
    else
    {
        return TRUE;
    }
}

function get_cart()
{
    $cart = $_COOKIE['cart'];
    
    return $cart;
}

if ($action == "2945")
{
    if (check_cart() == TRUE)
    {
        setcookie('cart', get_cart() . 'A3782543642', time() + (86400 * 30), '/');
        cookies_enabled();
    }
    else
    {
        setcookie('cart', '3782543642', time() + (86400 * 30), '/');
        cookies_enabled();   
    }
}

if ($action == "3258")
{
    if (check_cart() == TRUE)
    {
        setcookie('cart', get_cart() . 'A4872543642', time() + (86400 * 30), '/');
        cookies_enabled();
    }
    else
    {
        setcookie('cart', '4872543642', time() + (86400 * 30), '/');
        cookies_enabled();   
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Test Shop</h2>

<table>
  <tr>
    <th>Product</th>
    <th>Price</th>
    <th>Button</th>
  </tr>
  <tr>
    <td>Cheese 1</td>
    <td>50</td>
    <td><form method="post"><input type="hidden" name="action" value="2945"></input><input type="submit" value="Add to Cart"></input></form></td>
  </tr>
  <tr>
    <td>Cheese 2</td>
    <td>100</td>
    <td><form method="post"><input type="hidden" name="action" value="3258"></input><input type="submit" value="Add to Cart"></input></form></td>
  </tr>

</table>

<form action="checkout.php" method="post"><input type="submit" value="Checkout"></input></form>


</body>
</html>