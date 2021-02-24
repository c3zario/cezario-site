<?php
try
{
    if
    (
        $sql = new PDO
        (
            'mysql:host=localhost;dbname=czaros;encoding=utf8;port=3306'
        ,
            'root'
        ,
            ''
        )
    )
    echo '';
}
catch( PDOException $e )
{
    die( 'Nie połączono z bazą "baza"' );
}

<?php

function polacz_z_baza() {
    try {

        $sql = new PDO("mysql:host=mariadb105.server470011.nazwa.pl;dbname=server470011_cezariosq","server470011_cezariosq","3m@Z!LKn7zzK3Pe");
        $sql -> query ('SET NAMES utf8');
        $sql -> query ('SET CHARACTER_SET utf8_unicode_ci');

    }

    catch(PDOException $e) {

        echo $e->getMessage();

    }
        return $sql;
}

$sql = polacz_z_baza();