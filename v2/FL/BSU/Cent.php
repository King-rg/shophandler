<?php

class Cent_Arch
{
    public function addtocart($action)
    {
        if ($_COOKIE['cart'] == 0)
        {
            setcookie('cart', $action, time() + (86400 * 30), '/');
        }
        else
        {
            $cart = $_COOKIE['cart'];
            setcookie('cart', $cart.'-'.$action, time() + (86400 * 30), '/');
        }
    }
}

?>