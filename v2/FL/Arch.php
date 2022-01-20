<?php

require_once ('BSU/Vega.php');
require_once ('BSU/Cent.php');

//Arch functions can only be called via Core User Experience 

function arch_create($name, $price)
{
    session_start();
    
    $id = substr(sha1(mt_rand()),17,20);
    $token = $_SESSION['user'];
    
    $Vega_ArchObj = new Vega_Arch();
    $Vega_ArchObj->create($name, $price, $id, $token);
}

function arch_getproductregistrar()
{
    $Vega_ArchObj = new Vega_Arch();
    $Vega_SeraphimObj = new Vega_Seraphim();
    
    echo '
        <table>
         <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Cart</th>
            <th>Merchant</th>
         </tr>';
    
    $deletion_corrector = 0;
    $stop_register = 0;
    for ($x = 1; $x <= $Vega_ArchObj->get_numrows()+$deletion_corrector; $x++)
    {
        $row = $Vega_ArchObj->get_byoid($x);
        
        echo 'L';
        
        if (strlen($row[0]) == 0)
        {
            echo 'C';
            $deletion_corrector++;
        }
        else
        {
            if ($Vega_ArchObj->get_numrows() == $stop_register)
            {
                echo 'STOP';
                break;
            }
            else
            {
                $stop_register++;
                echo '<tr>
                        <td>'.$row[0].'</td>
                        <td>'.$row[1].'</td>
                        <td><form method="post"><input type="hidden" name="action" value="'.$row[2].'"></input><input type="submit" value="Add to Cart"></input></form></td>
                        <td>'.$Vega_SeraphimObj->get_username($row[3]).'</td>
                     </tr>';
                    
                echo '<br>' . $stop_register.' - '.$Vega_ArchObj->get_numrows() . '<br>';
            }
        }
    }
    
    echo '</table>';
}

function arch_addtocart($action)
{
    $Cent_ArchObj = new Cent_Arch();
    $Cent_ArchObj->addtocart($action);
}

function arch_getcheckout()
{
    echo
    '
    <form action="checkout.php" method="get" >
        <input value="Checkout" type="submit"></input>
    </form>  
    ';
}

?>