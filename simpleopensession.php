<?php

/**
* Simple MySQL X DevAPI example program
*
* This program opens a session to the server,
* gets the clientid information,
* gets the MySQL Server Version,
* gets the client information,
* and finally gets the schemas available to client user
* before closing the connection.
*/

# Open session to MySQL Server
$session = mysql_xdevapi\getSession("mysqlx://myuser:mypass@localhost");

# Client ID information
$clientid = $session->getClientId();
echo "Client id: " . $clientid . PHP_EOL;

# Server information
$serverVersion = $session->getServerVersion();
echo "Server version: " . $serverVersion . PHP_EOL;

# Client Information
$ids = $session->listClients();
echo "Current clients: ". json_encode($ids) . PHP_EOL;

$schemas  = $session->getSchemas();
var_dump($schemas);

# Close connection
$session->close();
?>
