<?php

require_once ('BSU/Vega.php');
require_once ('BSU/Cent.php');

function nexus_checksess($sess)
{
    $Vega_NexusObj = new Vega_Nexus();
    
    session_start();
    $token = $_SESSION['user'];
    
    return $Vega_NexusObj->check_sess($sess, $token);
}

function nexus_createsess()
{
    $Vega_NexusObj = new Vega_Nexus();
    
    session_start();
    $token = $_SESSION['user'];
    
    $id = substr(sha1(mt_rand()),17,20);
    
    echo $id;
    
    $return_id = $Vega_NexusObj->create_sess($id, $token);

    echo 
    '
    <body onload="document.returnform.submit()">
        <form action="checkout.php" method="GET" name="auth">
            <input type="hidden" name="id" value="' . $return_id . '">
        </form>
    </body>
    ';
    
    
}

?>