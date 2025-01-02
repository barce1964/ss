<?php
    class Dep {
        public static function getDepListByUser($userId) {
            include_once ROOT . '/db/connect.php';

            $db = new DB;

            $adm_flag = false;
            if ($userId == 1) {
                $qry = 'SELECT * FROM dep ORDER BY name_dep';
            } else {
                $qry = "SELECT a.id_role, b.id_dep FROM AT_ADM_ROLES a, DEP b, AT_ADM_USERS_ROLES_CON c WHERE a.ID_DEP = b.ID_DEP AND a.ID_ROLE = c.ID_ROLE AND c.ID_USER = " . $userId;
                $roles = $db->executeQry($qry, 11);
                $qry = "SELECT * FROM dep WHERE ";
                foreach($roles as $role) {
                    $qry = $qry . "id_dep = " . $role['id_dep'] . " OR ";
                    if (($role == 1) or ($role == 30)) {
                        $adm_flag = true;
                        break;
                    }
                }
                if ($adm_flag) {
                    $qry = 'SELECT * FROM dep ORDER BY name_dep';
                } else {
                    $qry = substr($qry, 0, -4);
                    $qry = $qry . " ORDER BY name_dep";
                }
            }

            return $db->executeQry($qry, 2);
        }

        public static function getDepList() {
            include_once ROOT . '/db/connect.php';

            $db = new DB;

            $qry = 'SELECT * FROM dep ORDER BY name_dep';
            
            return $db->executeQry($qry, 2);
        }

        public static function deleteDepById($id) {
            // Соединение с БД
            include_once ROOT . '/db/connect.php';
            $db = new Db();

            // Текст запроса к БД
            $sql = "DELETE FROM dep WHERE id_dep = $id";

            // Получение и возврат результатов. Используется подготовленный запрос
            return $db->deleteRowFromTable($sql);
        }

        public static function updateDepById($id, $option) {
            // Соединение с БД
            include_once ROOT . '/db/connect.php';
            $db = new Db();
            $name = $option['name'];
            // Текст запроса к БД
            $sql = "UPDATE dep
                SET 
                    name_dep = '$name' 
                WHERE id_dep = $id";

            // Получение и возврат результатов. Используется подготовленный запрос
            return $db->updateRowInTable($sql);
        }

        public static function getDepById($id) {
            // Соединение с БД
            include_once ROOT . '/db/connect.php';
            $db = new Db();

            // Текст запроса к БД
            $sql = "SELECT * FROM dep WHERE id_dep = $id";

            // Возвращаем данные
            return $db->executeQry($sql, 2);
        }

        public static function createDep($options) {
            // Соединение с БД
            include_once ROOT . '/db/connect.php';
            $db = new Db();
            $name = $options['name'];
            // Текст запроса к БД
            $sql = "INSERT INTO dep (name_dep) "
                    . "VALUES ('$name')";

            return $db->insertRowToDB($sql);
        }

        public static function getEqCountInDep($id) {
            include_once ROOT . '/db/connect.php';
            $db = new Db();

            $sql = "SELECT COUNT(*) FROM eq WHERE id_dep = '$id'";
            return $db->executeQry($sql, 1);
        }
    }
?>