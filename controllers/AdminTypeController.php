<?php

    class AdminTypeController extends AdminBase {

        
        public function actionIndex() {
            
            $typeList = Type::getTypeList();

            // Подключаем вид
            require_once(ROOT . '/views/admin_type/index.php');
            return true;
        }

        public function actionCreate() {
            // Обработка формы
            if (isset($_POST['submit'])) {
                // Если форма отправлена
                // Получаем данные из формы
                $name = $_POST['name'];

                // Флаг ошибок в форме
                $errors = false;

                // При необходимости можно валидировать значения нужным образом
                if (!isset($name) || empty($name)) {
                    $errors[] = 'Заполните полe';
                }


                if ($errors == false) {
                    // Если ошибок нет

                    Type::createType($name);

                    header("Location: /admin/type");
                }
            }

            require_once(ROOT . '/views/admin_type/create.php');
            return true;
        }

        public function actionUpdate($id) {
            
            $type = Type::getTypeById($id);

            // Обработка формы
            if (isset($_POST['submit'])) {
                // Если форма отправлена   
                // Получаем данные из формы
                $name = $_POST['name'];

                // Сохраняем изменения
                Type::updateTypeById($id, $name);

                header("Location: /admin/type");
            }

            // Подключаем вид
            require_once(ROOT . '/views/admin_type/update.php');
            return true;
        }

    }

?>
