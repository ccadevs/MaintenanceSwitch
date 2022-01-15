<?php
/*
 * Created on Sat Jan 15 2022 8:10:57 PM
 *
 * Author     : Mile S.
 * Contact    : info@ccwebspot.com
 * Website    : https://ccwebspot.com/
 * Copyright (c) 2022 CC.Webspot
 *
 */

    // Prevent from XSS

    $_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // Database connection settings

    $GLOBALS["HOST"]     = "localhost";
    $GLOBALS["USERNAME"] = "user";
    $GLOBALS["PASSWORD"] = "password";
    $GLOBALS["DATABASE"] = "dbname";

    $db = connectDatabase();
    function connectDatabase() {
        try {
            $db = new PDO("mysql:dbname={$GLOBALS["DATABASE"]};host={$GLOBALS["HOST"]}", $GLOBALS["USERNAME"], $GLOBALS["PASSWORD"]);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        } catch (PDOException $ex) {
            die('Povezivanje sa bazom podataka nije uspelo. Molimo kontaktirajte web mastera.');
        }
    }

?>