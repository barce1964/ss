<?php

    class Projects {
        public static function addProject($options) {
            include_once ROOT . '/db/connect.php';

            $db = new DB;
            $sql = "INSERT INTO ss_projects (id_place, name_project, ord_date, flag_ord) VALUES (" . $options['id_place'] . ", " . "'" . $options['name_project'] . "', '" . $options['date_ord'] . "', 'B')";
            
            return $db->insertRowToDB($sql);
        }

        public static function getLastLine() {
            include_once ROOT . '/db/connect.php';

            $db = new DB;

            $sql = "SELECT id_project FROM ss_projects ORDER BY id_project DESC LIMIT 1";
            return $db->executeQry($sql, 11);
        }
    }
?>
