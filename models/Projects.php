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

        public static function getListEqByType($id_type) {
            include_once ROOT . '/db/connect.php';

            $db = new DB;
            $sql = "SELECT a.id_eq, a.id_type, a.name_eq, b.eq_quantity, a.eq_units, c.id_place FROM ss_eq a,"
                . "ss_place_eq_con b, ss_spr_place c WHERE c.ID_PLACE = " . $_SESSION['city'] . " AND"
                . " a.ID_TYPE = " . $id_type . " AND a.ID_EQ = b.ID_EQ AND b.ID_PLACE = c.ID_PLACE";

            return $db->executeQry($sql, 14);
        }

        public static function getMaxIdEq() {
            include_once ROOT . '/db/connect.php';

            $db = new DB;

            $sql = "SELECT id_eq FROM ss_eq ORDER BY id_eq DESC LIMIT 1";
            return $db->executeQry($sql, 11);
        }

        public static function addEqInPrj($options) {
            include_once ROOT . '/db/connect.php';

            $db = new DB;

            $sql = "DELETE FROM ss_projects_eq_con WHERE id_eq = " . $options['id_eq'] . " AND id_project = " . $options['id_prj'];
            $db->deleteRowFromTable($sql);

            $sql = "INSERT INTO ss_projects_eq_con (id_eq, id_project, eq_quantity) VALUES (" . $options['id_eq'] . ", " . $options['id_prj'] . ", " . $options['eq_quantity'] . ")";
            return $db->insertRowToDB($sql);

        }

        public static function rPrj($id_prj) {
            include_once ROOT . '/db/connect.php';

            $db = new DB;

            $sql = "UPDATE ss_projects SET flag_ord = 'R' WHERE id_project = $id_prj";
            return $db->updateRowInTable($sql);
        }

        public static function getPrjList() {
            include_once ROOT . '/db/connect.php';

            $db = new DB;

            $sql = "SELECT a.id_project, b.name_place, a.name_project, a.ord_date FROM ss_projects a, ss_spr_place b WHERE a.ID_PLACE = b.ID_PLACE AND a.FLAG_ORD != 'E'";
            return $db->executeQry($sql, 15);
        }

        public static function getPrjDetail($id_prj) {
            include_once ROOT . '/db/connect.php';

            $db = new DB;

            $sql = "SELECT c.name_eq, b.eq_quantity, c.eq_units FROM ss_projects a, ss_projects_eq_con b, ss_eq c WHERE a.ID_PROJECT = $id_prj AND a.ID_PROJECT = b.ID_PROJECT AND b.ID_EQ = c.ID_EQ;";
            return $db->executeQry($sql, 16);
        }
    }
?>
