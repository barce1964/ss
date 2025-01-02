<?php
    class Inventory {
        public static function addInventory() {
            include_once ROOT . '/db/connect.php';

            $db = new DB;
                
            $sql = "SELECT count(id_inventory) FROM ss_inventory WHERE flag_saving = 0";
            if (!$db->executeQry($sql, 11)) {
                $sql = "INSERT INTO ss_inventory (id_city, date_inventory, flag_saving) VALUES (" . $_SESSION['city'] . ", CURDATE()" . " , 0)";
                $db->insertRowToDB($sql);
            }
            
            $sql = "SELECT max(id_inventory) FROM ss_inventory";
            return $db->executeQry($sql, 11);
        }

        public static function clearTableBase($idEq) {
            include_once ROOT . '/db/connect.php';

            $db = new DB;
            $idBase = $_SESSION['base'];
            $sql = "DELETE FROM ss_place_eq_con WHERE id_place = $idBase AND id_eq = $idEq";
            $db->deleteRowFromTable($sql);
        }

        public static function addEq($options) {
            include_once ROOT . '/db/connect.php';

            $db = new DB;
            
            $idInv = $options['id_inv'];
            $idEq = $options['id_eq'];
            $eqQuantity = $options['q'];

            $sql = "INSERT INTO ss_inv_eq_con (id_inventory, id_eq, eq_quantity) VALUES ($idInv, $idEq, $eqQuantity)";
            $db->insertRowToDB($sql);
            $idBase = $_SESSION['base'];
            $sql = "INSERT INTO ss_place_eq_con (id_place, id_eq, eq_quantity) VALUES ($idBase, $idEq, $eqQuantity)";
            $db->insertRowToDB($sql);
        }

        public static function closeInventory($idInv) {
            include_once ROOT . '/db/connect.php';

            $db = new DB;

            $sql ="UPDATE ss_inventory SET flag_saving = 1 WHERE id_inventory = $idInv";
            $db->updateRowInTable($sql);
        }

        public static function getDateOfLastInventory() {
            include_once ROOT . '/db/connect.php';

            $db = new DB;
            $sql = "SELECT max(id_inventory) FROM ss_inventory";
            $idInv = $db->executeQry($sql, 11);
            $sql = "SELECT date_inventory FROM ss_inventory WHERE id_inventory = $idInv";
            return $db->executeQry($sql, 11);
        }

        public static function getDateFormat($dateF) {
            $date = date_create($dateF);
            $month_list = array(
                1  => 'января',
                2  => 'февраля',
                3  => 'марта',
                4  => 'апреля',
                5  => 'мая', 
                6  => 'июня',
                7  => 'июля',
                8  => 'августа',
                9  => 'сентября',
                10 => 'октября',
                11 => 'ноября',
                12 => 'декабря'
            );
            return date_format($date, 'd') . '  ' . $month_list[date_format($date, 'm')] . '  ' . date_format($date, 'Y');
        }

        public static function getInvList() {
            include_once ROOT . '/db/connect.php';

            $db = new DB;

            $sql = "SELECT a.NAME_EQ, b.EQ_QUANTITY, a.EQ_UNITS
	            FROM SS_EQ a, SS_INV_EQ_CON b, SS_INVENTORY c
	            WHERE c.ID_INVENTORY = 1 AND a.ID_EQ = b.ID_EQ
	            AND b.ID_INVENTORY = c.ID_INVENTORY ORDER BY a.ID_TYPE";
            return $db->executeQry($sql, 12);
        }
    }
?>
