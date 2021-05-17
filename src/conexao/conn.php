<?php

    $hostmane = "librarytdccs.atwebpages.com";
    $dbname = "3832546_librarytcc";
    $username = "3832546_librarytcc";
    $password = "Sarahlinda515";

    try {
        $pdo = new PDO('mysql:host='.$hostmane.';dbname='.$dbname, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
    }