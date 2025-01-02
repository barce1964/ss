<?php

    class User {
        private static function genStr($step) {
            $i = 1;
            $strg = '';
            while ($i <= $step) {
                $shr_code = mt_rand ( 33, 124);
                if ($shr_code != 34 && $shr_code != 39 && $shr_code != 44 && $shr_code != 46 && $shr_code != 47 && $shr_code != 96) {
                    $shr = chr($shr_code);
                    $strg = $strg . $shr;
                    $i++;
                }
            }
            return $strg;
        }

        public static function register($name, $id_city, $id_role, $firstname, $lastname, $password) {

            include_once ROOT . '/db/connect.php';
            $db = new DB();
            $cipher = "aes-256-ofb";
            $iv = User::genStr(16);//openssl_random_pseudo_bytes($ivlen);
            $key = User::genStr(32);
            $pwd = openssl_encrypt($password, $cipher, $key, $options=0, $iv);
            
            $qry = 'INSERT INTO ss_at_adm_users (id_city, id_role, name_user, user_firstname, user_lastname, pwd_user, user_cif, user_iv, user_key) '
                . "VALUES ($id_city, $id_role, '$name', '$firstname', '$lastname', '$pwd', '$cipher', '$iv', '$key')";
            
            return $db->insertRowToDB($qry);
        }
        
        public static function updatePwd($userId, $password) {
            include_once ROOT . '/db/connect.php';
            $db = new DB();
            $cipher = "aes-256-ofb";
            $iv = User::genStr(16);//openssl_random_pseudo_bytes($ivlen);
            $key = User::genStr(32);
            $pwd = openssl_encrypt($password, $cipher, $key, $options=0, $iv);
            $sql = "UPDATE ss_at_adm_users SET pwd_user = '$pwd', user_cif = '$cipher', user_iv = '$iv', user_key = '$key' WHERE id_user = $userId";
            return $db->updateRowInTable($sql);
        }

        /**
         * Редактирование данных пользователя
         * @param string $name
         * @param string $password
         */
        public static function edit($id, $id_role, $id_city) {
            //$db = Db::getConnection();
            $db = new DB();
            $sql = "UPDATE ss_at_adm_users SET id_role = '$id_role', id_city = '$id_city' WHERE id_user = $id";
            
            return $db->updateRowInTable($sql);
        }

        public static function addRole($name, $id_role) {
            $db = new DB();

            $sql = "SELECT * FROM ss_at_adm_users WHERE name_user = '$name'";
            $id = $db->executeQry($sql, 1);
            
            $sql = '';

            $sql = "DELETE FROM ss_at_adm_users_roles_con WHERE id_user = " . $id['id_user'];
            $db->deleteRowFromTable($sql);

            $sql = "INSERT INTO ss_at_adm_users_roles_con (id_user, id_role) VALUES (" . $id['id_user'] . ", " . $id_role . ")";
            
            return $db->insertRowToDB($sql);
        }

        /**
         * Проверяем существует ли пользователь с заданными $email и $password
         * @param string $email
         * @param string $password
         * @return mixed : ingeger user id or false
         */
        public static function checkUserData($name, $password) {
            include_once ROOT . '/db/connect.php';
            $user = array();
            if ($name != '') {
                $db = new DB;
            
                //$pwd = crypt($password, '$6$rounds=5000$usesomesillystringforsalt$');
                $qry = "SELECT * FROM ss_at_adm_users WHERE name_user = '$name'";
                $user = $db->executeQry($qry, 1);
                $cipher = $user['user_cif'];
                $iv = $user['user_iv'];//openssl_random_pseudo_bytes($ivlen);
                $key = $user['user_key'];
                $pwd = openssl_encrypt($password, $cipher, $key, $options=0, $iv);
                $qry = "SELECT * FROM ss_at_adm_users WHERE name_user = '$name' and pwd_user = '$pwd'";
                $user = $db->executeQry($qry, 1);
            }
            if ($user) {
                $opt['id_user'] = $user['id_user'];
                $opt['id_city'] = $user['id_city'];
                return $opt;
            }

            return false;
        }

        /**
         * Запоминаем пользователя
         * @param string $email
         * @param string $password
         */
        public static function auth($userId) {
            $_SESSION['user'] = $userId['id_user'];
            $_SESSION['city'] = $userId['id_city'];
            if ($userId['id_city'] == 1) {
                $_SESSION['base'] = 1;
            } else {
                $_SESSION['base'] = 2;
            }
            $role = User::getUserRoles($userId['id_user']);
            if ($role == 1) {
                $_SESSION['adm'] = 1;
            } else {
                $_SESSION['adm'] = 0;
            }

            if ($role == 2) {
                $_SESSION['man'] = 1;
            } else {
                $_SESSION['man'] = 0;
            }

            if ($role == 3) {
                $_SESSION['skl'] = 1;
            } else {
                $_SESSION['skl'] = 0;
            }

            if ($role == 4) {
                $_SESSION['br'] = 1;
            } else {
                $_SESSION['br'] = 0;
            }

            if ($role == 5) {
                $_SESSION['tech'] = 1;
            } else {
                $_SESSION['tech'] = 0;
            }

            // AdminBase::getRoles();
        }

        public static function checkLogged() {
            // Если сессия есть, вернем идентификатор пользователя
            if (isset($_SESSION['user'])) {
                return $_SESSION['user'];
            } else {
                header("Location: /");
            }
        }

        public static function isGuest() {
            if (isset($_SESSION['user'])) {
                return false;
            }
            return true;
        }

        /**
         * Проверяет имя: не меньше, чем 2 символа
         */
        public static function checkName($name) {
            if (strlen($name) >= 4) {
                return true;
            }
            return false;
        }
        
        /**
         * Проверяет имя: уникальность
         */
        public static function checkNameUnique($name) {
            include_once ROOT . '/db/connect.php';
            $db = new DB();
            $sql = "SELECT count(*) FROM ss_at_adm_users WHERE name_user = '" . $name . "'";

            return $db->executeQry($sql, 6);
        }

        /**
         * Проверяет имя: не меньше, чем 8 символов
         */
        public static function checkPassword($password) {
            if (strlen($password) >= 8) {
                return true;
            }
            return false;
        }
        
        /**
         * Returns user by id
        * @param integer $id
        */
        public static function getUserById($id) {
            include_once ROOT . '/db/connect.php';

            if ($id) {
                $db = new DB();

                $sql = 'SELECT * FROM ss_at_adm_users WHERE id_user = ' . $id;

                return $db->executeQry($sql, 1);
            }
        }

        public static function getUserRoles($Id) {
            include_once ROOT . '/db/connect.php';

            if ($Id) {
                $db = new DB();
                $sql = "SELECT id_role FROM ss_at_adm_users WHERE id_user = " . $Id;
                
                return $db->executeQry($sql, 2);
            }
        }

        public static function getUsersList() {
            include_once ROOT . '/db/connect.php';
            $db = new DB();
            $sql = "SELECT a.id_user, a.name_user, a.user_firstname, a.user_lastname, b.name_role, c.name_city
                FROM ss_at_adm_users a, SS_AT_ADM_ROLES b, ss_spr_city c WHERE a.ID_ROLE = b.ID_ROLE AND a.id_city = c.id_city ORDER BY c.name_city";
            return $db->executeQry($sql, 5);
        }

        public static function deleteUserById($id) {
            include_once ROOT . '/db/connect.php';
            $db = new DB();

            $sql = "DELETE FROM ss_at_adm_users  WHERE id_user = $id";
            $res = $db->deleteRowFromTable($sql);

            return true;
        }

        public static function getRolesList() {
            include_once ROOT . '/db/connect.php';
            $db = new DB();

            $sql = "SELECT * FROM ss_at_adm_roles ORDER BY id_role";

            return $db->executeQry($sql, 4);
        }

        public static function createRole($options) {
            include_once ROOT . '/db/connect.php';
            $db = new DB();
            
            $sql = "INSERT INTO ss_at_adm_roles (name_role) VALUES ('" . $options['name_role'] . "')";
            return $db->insertRowToDB($sql);
        }

        public static function getRoleById($id) {
            include_once ROOT . '/db/connect.php';
            $db = new DB();

            $sql = "SELECT * FROM ss_at_adm_roles WHERE id_role = " . $id;
            return $db->executeQry($sql, 4);
        }

        public static function updateRoleById($id, $options) {
            include_once ROOT . '/db/connect.php';
            $db = new DB();

            $name_role = $options['name_role'];
            $sql = "UPDATE ss_at_adm_roles SET name_role = '$name_role' WHERE id_role = $id";
            return $db->updateRowInTable($sql);
        }

        public static function deleteRoleById($id) {
            include_once ROOT . '/db/connect.php';
            $db = new DB();

            $sql = "DELETE FROM ss_at_adm_users_roles_con WHERE id_role = " . $id;
            $db->deleteRowFromTable($sql);

            $sql = "DELETE FROM ss_at_adm_roles WHERE id_role = " . $id;
            $db->deleteRowFromTable($sql);
        }
    }
?>