<?php
    include_once ROOT . '/models/User.php';
    
    class AdminUserController extends AdminBase {

        /**
         * Action для страницы "Управление пользователями"
         */
        public function actionIndex() {
            
            // Получаем список пользователей
            $usersList = User::getUsersList();

            // Подключаем вид
            require_once(ROOT . '/views/admin_user/index.php');
            return true;
        }

        
        public function actionCreate() {
            
            $roles = User::getRolesList();
            // Обработка формы
            if (isset($_POST['submit'])) {
                // Если форма отправлена
                // Получаем данные из формы
                $name = $_POST['name'];
                $id_city = $_POST['id_city'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $pwd = $_POST['pwd'];
                $pwd2 = $_POST['pwd2'];
                $id_role = $_POST['id_role'];

                // Флаг ошибок в форме
                $errors = false;

                // При необходимости можно валидировать значения нужным образом
                if (!isset($name) || empty($name) || !isset($firstname) || empty($firstname) || !isset($lastname) || empty($lastname)) {
                    $errors[] = 'Заполните поля';
                }

                if (!User::checkName($name)) {
                    $errors[] = 'Ник не должен быть короче 4-х символов';
                }
                
                if (User::checkNameUnique($name) != 0) {
                    $errors[] = 'Такой ник уже существует';
                }

                if (!User::checkPassword($pwd)) {
                    $errors[] = 'Пароль не должен быть короче 8-ми символов';
                }
                
                if ($pwd != $pwd2) {
                    $errors[] = 'Пароли не совпадают';
                }

                if ($errors == false) {
                    // Если ошибок нет
                    // Добавляем нового пользователя

                    User::register($name, $id_city, $id_role, $firstname, $lastname, $pwd);

                    // Перенаправляем пользователя на страницу управления пользователями
                    header("Location: /admin/user");
                }
            }

            require_once(ROOT . '/views/admin_user/create.php');
            return true;
        }

        /**
         * Action для страницы "Редактировать пользователя"
         */
        public function actionUpdate($id) {
            // // Проверка доступа
            // self::checkAdmin();

            // Получаем данные о конкретной категории
            $user = User::getUserById($id);

            $roles = User::getRolesList();
            $role_usr = User::getUserRoles($id);

            // $id_city = $_POST['id_city'];
            // $id_role = $_POST['id_role'];

            // Обработка формы
            if (isset($_POST['submit'])) {
                // Если форма отправлена   
                // Получаем данные из формы
                $id_city = $_POST['id_city'];
                $id_role = $_POST['id_role'];

                // Флаг ошибок в форме
                $errors = false;

                if ($errors == false) {
                    // Если ошибок нет
                    // Изменяем данные пользователя
                    $roles_usr = $_POST['roles_usr'];

                    User::edit($id, $id_role, $id_city);

                    // Перенаправляем пользователя на страницу управления пользователями
                    header("Location: /admin/user");
                }

            }

            require_once(ROOT . '/views/admin_user/update.php');
            return true;
        }

        /**
         * Action для страницы "Удалить пользователя"
         */
        public function actionDelete($Id) {

            // Обработка формы
            if (isset($_POST['submit'])) {
                // Если форма отправлена
                // Удаляем пользователя

                User::deleteUserById($Id);

                    // Перенаправляем пользователя на страницу управлениями товарами
                    header("Location: /admin/user");
                }

            // Подключаем вид
            require_once(ROOT . '/views/admin_user/delete.php');
            return true;
        }

    }

?>
