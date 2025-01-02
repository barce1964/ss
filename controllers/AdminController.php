<?php

    /**
    * Контроллер AdminController
    * Главная страница в админпанели
    */
    include_once ROOT . '/models/User.php';

    class AdminController extends AdminBase {
        /**
        * Action для стартовой страницы "Панель администратора"
        */
        public function actionIndex() {

            // Подключаем вид
            require_once(ROOT . '/views/admin/index.php');
            return true;
        }

        public function actionPwd() {
            $userId = $_SESSION['user'];
            $userPwd = '';
            $repPwd = '';
            if (isset($_POST['submit'])) {
                $errors = false;

                $userPwd = $_POST['userPwd'];
                $repPwd = $_POST['repPwd'];

                if (!User::checkPassword($userPwd)) {
                    $errors[] = 'Пароль не должен быть короче 8-ми символов';
                }

                if ($userPwd != $repPwd) {
                    $errors[] = "Пароли не совпадают.";
                }

                if ($errors == false) {
                    User::updatePwd($userId, $userPwd);

                    header("Location: /admin");
                }
            }

            require_once(ROOT . '/views/admin/pwd.php');
            return true;
        }

        public function actionField() {
            require_once(ROOT . '/views/admin/field.php');
            return true;
        }
    }
?>
