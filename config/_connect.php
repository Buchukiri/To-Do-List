<?php
    try {
        $dbCo = new PDO(
            'mysql:host=localhost;dbname=to_do_list;charset=utf8',
            'tima',
            'XsDtj@x@.0YLKET('
            );
        $dbCo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
            PDO::FETCH_ASSOC);
            }
            catch (Exception $e) {
            die("Unable to connect to the database.
            ".$e->getMessage());
            };
    ?>