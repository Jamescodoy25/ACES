<?php
$serverName = "JAMESCODOY";



$connectionOptions = array(
    "Database" => "aces_guidance_sys",
    "Uid" => "",
    "PWD" => "" ,
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "";
}
?>