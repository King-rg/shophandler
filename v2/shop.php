<?php

require_once('FL/Arch.php');
require_once('FL/Seraphim.php');

$current_page = $_SERVER['REQUEST_URI'];

seraphim_handle($current_page);

$action = $_POST['action'];

if (strlen($action) == 20)
{
    arch_addtocart($action);
}

arch_getproductregistrar();

arch_getcheckout();

?>