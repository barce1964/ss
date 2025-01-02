<?php

    class Eq {

        // public static function getEqListByType($TypeId) {
        //     include_once ROOT . '/db/connect.php';
        //     if ($DepId) {
        //         $db = new DB;
                
        //         $query="SELECT a.id_eq, b.name_type, a.name_eq, "
        //             . "a.config_eq, a.room, a.rem FROM ss_eq a, ss_type_eq b "
        //             . "a.id_type = b.id_type AND "
        //             . "a.id_type = '$TypeId' ORDER BY a.room";

        //         return $db->executeQry($query, 4);
        //     }
        // }

        public static function getEqList() {
            include_once ROOT . '/db/connect.php';

            $db = new DB;
                
            $qry="SELECT a.id_eq, b.name_type, a.name_eq, a.eq_units FROM ss_eq a, ss_type_eq b WHERE a.id_type = b.id_type ORDER BY b.id_type";

            return $db->executeQry($qry, 8);

        }

        public static function getEqById($id) {
            include_once ROOT . '/db/connect.php';
            $id = intval($id);
            
            if ($id) {                        

                $connect = new DB;
                $query = 'SELECT a.id_eq, b.name_type, a.name_eq, a.eq_units FROM ss_eq a, ss_type_eq b WHERE id_eq= ' . $id . ' AND a.id_type = b.id_type';
                            
                return $connect->executeQry($query, 9);
            }
        }

        public static function deleteEqById($id) {
            // Соединение с БД
            include_once ROOT . '/db/connect.php';
            $db = new Db();
            
            $sql = "SELECT * FROM ss_eq_quantity WHERE id_eq = $id";
            $idOrds = $db->executeQry($sql, 10);
            foreach ($idOrds as $idOrd) {
                $sql = "DELETE FROM ss_order WHERE id_order = $idOrd";
                $db->deleteRowFromTable($sql);
            }

            $sql = "DELETE FROM ss_eq_quantity WHERE id_eq = $id";
            $db->deleteRowFromTable($sql);

            // Текст запроса к БД
            $sql = "DELETE FROM ss_eq WHERE id_eq = $id";

            // Получение и возврат результатов. Используется подготовленный запрос
            
            return $db->deleteRowFromTable($sql);
        }

        public static function updateEqById($id, $options) {
            // Соединение с БД
            include_once ROOT . '/db/connect.php';
            $db = new Db();

            // Текст запроса к БД
            $sql = "UPDATE ss_eq SET name_eq = '$options[name_eq]', eq_units = '$options[eq_units]' WHERE id_eq = $id";

            return $db->updateRowInTable($sql);
        }

        public static function createEq($options) {
            // Соединение с БД
            include_once ROOT . '/db/connect.php';
            $db = new Db();

            // Текст запроса к БД
            
            $sql = "INSERT INTO ss_eq (id_type, name_eq, eq_units) VALUES ('$options[id_type]', '$options[name_eq]', '$options[eq_units]')";

            if ($db->insertRowToDB($sql)) {
                // Если запрос выполенен успешно, возвращаем id добавленной записи
                return $db->lastInsertIdEq();
            }
            // Иначе возвращаем 0
            return 0;
        }

        public static function getRoomList($id_dep) {
            // Соединение с БД
            include_once ROOT . '/db/connect.php';
            $db = new Db();

            if ($id_dep == 0) {
                $sql = 'SELECT DISTINCT room FROM eq ORDER BY room';
            } else {
                $sql = 'SELECT DISTINCT room FROM eq WHERE id_dep = ' . $id_dep . ' ORDER BY room';
            }
            
            return $db->executeQry($sql, 7);
        }

    }

?>