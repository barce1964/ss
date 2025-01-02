<?php

    
    include_once ROOT . '/models/User.php';
    

    class SiteController {

        public function actionIndex() {
            $adm_flag = false;
            if (!User::isGuest()) {
                if (isset($_POST['submit']) && ($_POST['submit'] != '')) {
                    $userId = $_SESSION['user'];
                    // $depList = Dep::getDepListByUser($userId);
                    $roles = User::getUserRoles($userId);
                    // $typeList = Type::getTypeList();
                    foreach($roles as $role) {
                        if (($role == 1) || ($role == 30)) {
                            $adm_flag = true;
                            break;
                        }
                    }
                    if (($userId == 1) || ($adm_flag)) {
                        $adm_flag = true;
                    } else {
                        $adm_flag = false;
                    }

                    if (!$adm_flag) {
                        $option['id_dep'] = $depList[0]['id_dep'];
                        $options['id_dep'] = (isset($_POST['id_dep'])) ? (int)$_POST['id_dep'] : $depList[0]['id_dep'];
                    } else {
                        $options['id_dep'] = (isset($_POST['id_dep'])) ? (int)$_POST['id_dep'] : 0;
                    }
    
                    $options['id_type'] = (isset($_POST['id_type'])) ? (int)$_POST['id_type'] : 0;
                    $options['room'] = (isset($_POST['room'])) ? $_POST['room'] : 0;
    
                    $roomList = Eq::getRoomList($options['id_dep']);

                    $_SESSION['admin_flag'] = $adm_flag;
                }
            }

            require_once(ROOT . '/views/site/index.php');
            return true;

        }

        public function actionLogin() {
            $name = '';
            $password = '';
            
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $password = $_POST['password'];
                
                $errors = false;
                            
                // Валидация полей
                        
                if (!User::checkPassword($password)) {
                    $errors[] = 'Пароль не должен быть короче 8-ти символов';
                }
                
                // Проверяем существует ли пользователь
                $userId = User::checkUserData($name, $password);
                
                if ($userId == false) {
                    // Если данные неправильные - показываем ошибку
                    $errors[] = 'Неправильные ник или пароль';
                }
                if ($errors == false) {
                    // Если данные правильные, запоминаем пользователя (сессия)
                    User::auth($userId);
                    // Перенаправляем пользователя в закрытую часть
                    header("Location: /"); 
                }

            } elseif (isset($_POST['cancel'])) {
                header("Location: /");
            }

            require_once(ROOT . '/views/site/login.php');

            return true;
        }
        
        /**
         * Удаляем данные о пользователе из сессии
         */
        public function actionLogout() {
            unset($_SESSION["user"]);
            unset($_SESSION['city']);
            unset($_SESSION['adm']);
            unset($_SESSION['man']);
            unset($_SESSION['skl']);
            unset($_SESSION['br']);
            unset($_SESSION['tech']);

            header("Location: /");
        }

        public function actionVer() {
            require_once(ROOT . '/views/site/ver.php');
        }
    }

?>