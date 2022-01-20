<?php

require_once('BSU/Vega.php');
require_once('BSU/Cherubim.php');

function seraphim_handle($return_page)
{
    session_start();
    
    if (isset($_SESSION['user'])) 
    {
        
    } else 
    {
        echo 
        '
        <body onload="document.returnform.submit()">
            <form action="login.php" method="POST" name="returnform">
                <input type="hidden" name="return" value="' . $return_page . '">
            </form>
        </body>
        ';
    }
}

function seraphim_createacc($username, $password)
{
    $ip = cherubim_ipinfo();
    $token = substr(sha1(mt_rand()),17,20);
    
    $Vega_SeraphimObj = new Vega_Seraphim;
    
    if ($Vega_SeraphimObj->check_username($username))
    {
        echo 'Account already exists!';
    }
    else
    {
        $Vega_SeraphimObj->create_account($username, $password, $ip, $token);
        
        header('Location:'."/experimental/shop_handling/v2/login.php");        
    }

}

function seraphim_createsess($username, $password, $return_page)
{
    session_start();
    
    $ip = cherubim_ipinfo();
    
    $Vega_SeraphimObj = new Vega_Seraphim;
    
    if ($Vega_SeraphimObj->check_ip($username, $ip))
    {
        if ($password == $Vega_SeraphimObj->get_password($username))
        {
            $_SESSION['user'] = $Vega_SeraphimObj->get_token($username);
            header('Location:'.$return_page);
        }
        else
        {
            echo 'Incorrect Password';
        }
    }
    else
    {
        echo 'IP Submitted: '.$ip;
        echo 'ACC IP: '. $Vega_SeraphimObj->get_ip($username);
        echo 'Authentication Failed';
    }
}

function seraphim_sessdebug()
{
    echo 'SESSION ID: '.session_id();
    echo 'TOKEN: '. $_SESSION['user'];
    echo ini_get( 'session.save_path');
}

?>