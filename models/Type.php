<?php
    class Type {
        public static function getTypeList() {
            include_once ROOT . '/db/connect.php';

            $db = new DB;
            $query = 'select * from ss_type_eq ORDER BY name_type';

            return $db->executeQry($query, 3);
        }

        public static function updateTypeById($id, $name) {
            // Соединение с БД
            include_once ROOT . '/db/connect.php';
            $db = new Db();
            
            // Текст запроса к БД
            $sql = "UPDATE ss_type_eq SET name_type = '$name' WHERE id_type = $id";

            // Получение и возврат результатов. Используется подготовленный запрос
            return $db->updateRowInTable($sql);
        }

        public static function getTypeById($id) {
            // Соединение с БД
            include_once ROOT . '/db/connect.php';
            $db = new Db();

            // Текст запроса к БД
            $sql = "SELECT * FROM ss_type_eq WHERE id_type = $id";

            // Возвращаем данные
            return $db->executeQry($sql, 7);
        }

        public static function createType($name) {
            // Соединение с БД
            include_once ROOT . '/db/connect.php';
            $db = new Db();
            
            // Текст запроса к БД
            $sql = "INSERT INTO ss_type_eq (name_type) VALUES ('$name')";

            return $db->insertRowToDB($sql);
        }

    }
?>