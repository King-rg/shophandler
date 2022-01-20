<?php

require_once('FL/Seraphim.php');
require_once('FL/Nexus.php');

$current_page = $_SERVER['REQUEST_URI'];

seraphim_handle($current_page);

$sess = $_GET['id'];

if (!nexus_checksess($sess))
{
    nexus_createsess();
}

?>