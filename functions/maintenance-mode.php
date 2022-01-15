<?php
/*
 * Created on Sat Jan 15 2022 8:05:30 PM
 *
 * Author     : Mile S.
 * Contact    : info@ccwebspot.com
 * Website    : https://ccwebspot.com/
 * Copyright (c) 2022 CC.Webspot
 *
 */

    // Config File
    include $_SERVER['DOCUMENT_ROOT'] . '/database/config.php';

    function MaintenanceMode() {
        global $db;
        $stmt = $db->prepare("SELECT status FROM tablename");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            if($row['status'] == 0) {
                // If you have specific URL where you want to visitors be redirected, type it bellow and remove comment sign...
                // header('Location: example.com/website-mode-live');
            } else {
                // If maintenance mode is on, visitors will be redirected to $maitnenanceURL, change it to your address
                $maintenanceURL = '/maintenance-mode';
                header('Location: ' . $maintenanceURL);
            }
        }
    }

?>
