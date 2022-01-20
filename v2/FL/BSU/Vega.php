<?php

function TEST_vega_auth()
{
    //Remember keep all creds in local scope so they cant be cross-referenced in other files in case of an attack on our systems. 
    $servername = "localhost";
    $username = "digtlemperium";
    $password = "g3BI7yHw4XUaUhj067";
    $dbname = "digtlemperium_exp_shophandling_v2";
    
    /*
    Return values:
        0: Success
        1: Connection failed
        2: Already authenticated
    */
    
    //Check flag
    if ($authed_flag == 1)
    {
        return 2;
    }
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return 1;
    }
    
    return 0;
}

function TEST_vega_deauth()
{
    /*
    Return values:
        0: Success
        2: Already authenticated
    */
    
    if ($authed_flag == 0)
    {
        return 2;
    }
    
    $conn->close();
    
    return 0;
}

class Vega_Arch 
{
    public function create($name, $price, $id, $token)
    {
        //Remember keep all creds in local scope so they cant be cross-referenced in other files in case of an attack on our systems. 
        $servername = "localhost";
        $username = "digtlemperium";
        $password = "g3BI7yHw4XUaUhj067";
        $dbname = "digtlemperium_exp_shophandling_v2";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return 1;
        }
        
        $stmt = $conn->prepare("INSERT INTO product_registrar (name, price, id, acc_token) VALUES (?,?,?,?)");
        $stmt->bind_param("siss", $name, $price, $id, $token);
        $stmt->execute();
        $stmt->close();
        
        $conn->close();
        
        return 0;
    }
    
    public function get_byoid($rd) //Method of getting products from database using the oid. The rd stands for request data. 
    {
        /*
        
        RT Configurations:
        0 - Dump specific row of entire table. 
        
        */
        
        //Remember keep all creds in local scope so they cant be cross-referenced in other files in case of an attack on our systems. 
        $servername = "localhost";
        $username = "digtlemperium";
        $password = "g3BI7yHw4XUaUhj067";
        $dbname = "digtlemperium_exp_shophandling_v2";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return 1;
        }

        $stmt = $conn->prepare("SELECT name, price, id, acc_token FROM product_registrar WHERE oid = ?");
        $stmt->bind_param("i", $rd);
        $stmt->execute();
        $stmt->bind_result($name, $price, $id, $token);
        $stmt->fetch();
        $stmt->close();
        
        $conn->close();
        
        $result = array($name, $price, $id, $token);
        
        return $result;
    }
    
    public function get_numrows()
    {
        //Remember keep all creds in local scope so they cant be cross-referenced in other files in case of an attack on our systems. 
        $servername = "localhost";
        $username = "digtlemperium";
        $password = "g3BI7yHw4XUaUhj067";
        $dbname = "digtlemperium_exp_shophandling_v2";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return 1;
        }

        $response = $conn->query("SELECT name, price, id FROM product_registrar");
        
        $result = $response->num_rows;
        
        $conn->close();
        
        return $result;
    }
}

class Vega_Seraphim
{
    public function create_account($usernamex, $passwordx, $ip, $token)
    {
        //Remember keep all creds in local scope so they cant be cross-referenced in other files in case of an attack on our systems. 
        $servername = "localhost";
        $username = "digtlemperium";
        $password = "g3BI7yHw4XUaUhj067";
        $dbname = "digtlemperium_exp_shophandling_v2";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return 1;
        }
        
        $stmt = $conn->prepare("INSERT INTO accounts (username, password, ip, token) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $usernamex, $passwordx, $ip, $token);
        $stmt->execute();
        $stmt->close();
        
        $conn->close();
        
        return 0;        
    }
    
    public function create_session()
    {
        //Remember keep all creds in local scope so they cant be cross-referenced in other files in case of an attack on our systems. 
        $servername = "localhost";
        $username = "digtlemperium";
        $password = "g3BI7yHw4XUaUhj067";
        $dbname = "digtlemperium_exp_shophandling_v2";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return 1;
        }
        
        $stmt = $conn->prepare("SELECT name, price, id FROM product_registrar WHERE oid = ?");
        $stmt->bind_param("i", $rd);
        $stmt->execute();
        $stmt->bind_result($name, $price, $id);
        $stmt->fetch();
        $stmt->close();
        
        $conn->close();
        
    }
    
    public function check_ip($usernamex, $ip)
    {
        //Remember keep all creds in local scope so they cant be cross-referenced in other files in case of an attack on our systems. 
        $servername = "localhost";
        $username = "digtlemperium";
        $password = "g3BI7yHw4XUaUhj067";
        $dbname = "digtlemperium_exp_shophandling_v2";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return 1;
        }
        
        $stmt = $conn->prepare("SELECT ip FROM accounts WHERE username = ?");
        $stmt->bind_param("s", $usernamex);
        $stmt->execute();
        $stmt->bind_result($acc_ip);
        $stmt->fetch();
        $stmt->close();
        
        $conn->close();
        
        if ($acc_ip == $ip)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
    public function get_ip($usernamex)
    {
        //Remember keep all creds in local scope so they cant be cross-referenced in other files in case of an attack on our systems. 
        $servername = "localhost";
        $username = "digtlemperium";
        $password = "g3BI7yHw4XUaUhj067";
        $dbname = "digtlemperium_exp_shophandling_v2";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return 1;
        }
        
        $stmt = $conn->prepare("SELECT ip FROM accounts WHERE username = ?");
        $stmt->bind_param("s", $usernamex);
        $stmt->execute();
        $stmt->bind_result($acc_ip);
        $stmt->fetch();
        $stmt->close();
        
        $conn->close();
        
        return $acc_ip;
    }
    
    public function get_token($usernamex)
    {
        //Remember keep all creds in local scope so they cant be cross-referenced in other files in case of an attack on our systems. 
        $servername = "localhost";
        $username = "digtlemperium";
        $password = "g3BI7yHw4XUaUhj067";
        $dbname = "digtlemperium_exp_shophandling_v2";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return 1;
        }
        
        $stmt = $conn->prepare("SELECT token FROM accounts WHERE username = ?");
        $stmt->bind_param("s", $usernamex);
        $stmt->execute();
        $stmt->bind_result($token);
        $stmt->fetch();
        $stmt->close();
        
        return $token;
    }
    
    public function get_username($token)
    {
        //Remember keep all creds in local scope so they cant be cross-referenced in other files in case of an attack on our systems. 
        $servername = "localhost";
        $username = "digtlemperium";
        $password = "g3BI7yHw4XUaUhj067";
        $dbname = "digtlemperium_exp_shophandling_v2";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return 1;
        }
        
        $stmt = $conn->prepare("SELECT username FROM accounts WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->bind_result($usernamex);
        $stmt->fetch();
        $stmt->close();
        
        return $usernamex;
    }
    
    public function get_password($usernamex)
    {
        //Remember keep all creds in local scope so they cant be cross-referenced in other files in case of an attack on our systems. 
        $servername = "localhost";
        $username = "digtlemperium";
        $password = "g3BI7yHw4XUaUhj067";
        $dbname = "digtlemperium_exp_shophandling_v2";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return 1;
        }
        
        $stmt = $conn->prepare("SELECT password FROM accounts WHERE username = ?");
        $stmt->bind_param("s", $usernamex);
        $stmt->execute();
        $stmt->bind_result($pass);
        $stmt->fetch();
        $stmt->close();
        
        return $pass;
    }
    
    public function check_username($usernamex)
    {
        //Remember keep all creds in local scope so they cant be cross-referenced in other files in case of an attack on our systems. 
        $servername = "localhost";
        $username = "digtlemperium";
        $password = "g3BI7yHw4XUaUhj067";
        $dbname = "digtlemperium_exp_shophandling_v2";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return 1;
        }
        
        $stmt = $conn->prepare("SELECT COUNT(1) FROM accounts WHERE username = ?");
        $stmt->bind_param("s", $usernamex);
        $stmt->execute();
        $stmt->bind_result($amount);
        $stmt->fetch();
        $stmt->close();
        
        $conn->close();
        
        if ($amount == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
}

class Vega_Nexus
{
    public function prune_sess()
    {
        
    }
    
    public function check_sess($id, $token)
    {
        //Remember keep all creds in local scope so they cant be cross-referenced in other files in case of an attack on our systems. 
        $servername = "localhost";
        $username = "digtlemperium";
        $password = "g3BI7yHw4XUaUhj067";
        $dbname = "digtlemperium_exp_shophandling_v2";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return 1;
        }
        
        $stmt = $conn->prepare("SELECT acc_token FROM checkout_sess WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->bind_result($acc_id);
        $stmt->fetch();
        $stmt->close();
        
        $conn->close();
        
        if ($acc_id == $token)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }        
    }
    
    public function create_sess($id, $token)
    {
        //Remember keep all creds in local scope so they cant be cross-referenced in other files in case of an attack on our systems. 
        $servername = "localhost";
        $username = "digtlemperium";
        $password = "g3BI7yHw4XUaUhj067";
        $dbname = "digtlemperium_exp_shophandling_v2";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return 1;
        }
        
        $stmt = $conn->prepare("INSERT INTO checkout_sess (id, acc_token) VALUES (?,?)");
        $stmt->bind_param("ss", $id, $token);
        $stmt->execute();
        $stmt->close();
        
        $conn->close();
        
        return $id;          
    }
}

?>