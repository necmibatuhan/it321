
<?php
$serverName = "tr1.azurewebsites.net";
$connectionOptions = array(
    "Database" => "registration",
    "Uid" => "batu",
    "PWD" => "Kh56662017924"
);
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
