<?php
// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "batu", "pwd" => "{your_password_here}", "Database" => "registration", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:it321nba.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
