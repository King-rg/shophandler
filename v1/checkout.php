<?php

//This code is too basic to be connected to Stripe. 

$raw_cart = $_COOKIE['cart'];
$cart = explode("A", $raw_cart);
$cart_size = count($cart);

echo '<table>  <tr>
    <th>Product</th>
    <th>Price</th>
  </tr>';

for ($x=0; $x<$cart_size;$x++)
{
    if ($cart[$x] == "3782543642")
    {
        echo
        '
  <tr>
        <td>Cheese 1</td>
    <td>50</td>
  </tr>  
        ';
    }
    
    if ($cart[$x] == "4872543642")
    {
        echo
        '
  <tr>
    <td>Cheese 2</td>
    <td>100</td>
  </tr>
        ';
    }
}

echo '</table>';

?>

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