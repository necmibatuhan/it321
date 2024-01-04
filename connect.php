<?php
// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "batu", "pwd" => "{Kh56662017924}", "Database" => "registration", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:it321nba.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
