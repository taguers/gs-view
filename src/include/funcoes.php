<?php

function dd($data, $stop = false)
{
    echo "<pre>";
    print_r($data);
    if ($stop) {
        die;
    }
}

function conectar()
{
    global $conn, $porPagina;
    $server = 'localhost';
    $port = '1443';
    $server = $port !== '1443' && is_string($port) ? $server .= ", $port": $server;
    $database = 'gosoftlocal';
    $user = 'sa';
    $pass = 'taguedev';
    $conn = sqlsrv_connect($server, array('Database' => $database, 'UID' => $user, 'PWD' => $pass));
    $porPagina = 10;
}

function consultar($sql)
{
    global $conn;
    return sqlsrv_query($conn, $sql);
}
