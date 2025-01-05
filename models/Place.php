<?php

    class Place {
        public static function addPlace($id_city, $place) {
            include_once ROOT . '/db/connect.php';

            $db = new DB;
            $sql = "INSERT INTO ss_spr_place (id_city, name_place) VALUES ($id_city, " . "'" . $place . "')";
            
            $db->insertRowToDB($sql);
        }

        public static function getListPlace() {
            include_once ROOT . '/db/connect.php';

            $db = new DB;

            $sql = "SELECT id_place, id_city, name_place FROM ss_spr_place WHERE id_city = " . $_SESSION['city'];
            return $db->executeQry($sql, 13);
        }
    }
?>
