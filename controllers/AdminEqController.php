<?php

    
    class AdminEqController extends AdminBase {

        public function actionIndex() {
            
            $eqList = Eq::getEqList();
            
            require_once(ROOT . '/views/admin_eq/index.php');
            return true;
        }

        public function actionCreate() {
            
            $typeList = Type::getTypeList();

            // Обработка формы
            if (isset($_POST['submit'])) {
                // Если форма отправлена
                // Получаем данные из формы
                $options['id_type'] = $_POST['id_type'];
                $options['name_eq'] = $_POST['name_eq'];
                $options['eq_units'] = $_POST['eq_units'];

                // Флаг ошибок в форме
                $errors = false;

                // При необходимости можно валидировать значения нужным образом
                if (!isset($options['name_eq']) || empty($options['name_eq']) || !isset($options['eq_units']) || empty($options['eq_units'])) {
                    $errors[] = 'Заполните поля';
                }

                if ($errors == false) {
                    // Если ошибок нет
                    $id = Eq::createEq($options);

                    header("Location: /admin/eq");
                }
            }

            // Подключаем вид
            require_once(ROOT . '/views/admin_eq/create.php');
            return true;
        }

        public function actionUpdate($id) {
            
            $eq = Eq::getEqById($id);

            // Обработка формы
            if (isset($_POST['submit'])) {
                // Если форма отправлена
                // Получаем данные из формы
                $options['name_type'] = $_POST['name_type'];
                $options['name_eq'] = $_POST['name_eq'];
                $options['eq_units'] = $_POST['eq_units'];

                // Флаг ошибок в форме
                $errors = false;

                // При необходимости можно валидировать значения нужным образом
                if (!isset($options['name_eq']) || empty($options['name_eq']) || !isset($options['eq_units']) || empty($options['eq_units'])) {
                    $errors[] = 'Заполните поля';
                }

                if ($errors == false) {
                    // Если ошибок нет
                    $id = Eq::updateEqById($id, $options);

                    header("Location: /admin/eq");
                }
            }

            // Подключаем вид
            require_once(ROOT . '/views/admin_eq/update.php');
            return true;

        }

        
        public function actionDelete($id) {
            $eq = Eq::getEqById($id);
            $nameEq = $eq['name_eq'];
            // Обработка формы
            if (isset($_POST['submit'])) {
                // Если форма отправлена
                
                Eq::deleteEqById($id);

                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/eq/");
            }

            // Подключаем вид
            require_once(ROOT . '/views/admin_eq/delete.php');
            return true;
        }

    }
?>