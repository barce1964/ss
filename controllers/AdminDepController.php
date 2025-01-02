<?php

    
    class AdminDepController extends AdminBase {

        
        public function actionIndex() {
            
            $depList = Dep::getDepList();
            
            require_once(ROOT . '/views/admin_dep/index.php');
            return true;
        }

        public function actionCreate() {
            
            $depList = Dep::getDepList();

            if (isset($_POST['submit'])) {
                
                $options['name'] = $_POST['name'];

                $errors = false;
                
                if (!isset($options['name']) || empty($options['name'])) {
                    $errors[] = 'Заполните поле';
                }

                if ($errors == false) {
                    
                    $id = Dep::createDep($options);

                    header("Location: /admin/dep");
                }
            }

            require_once(ROOT . '/views/admin_dep/create.php');
            return true;
        }

        
        public function actionUpdate($id) {
            
            $dep = Dep::getDepById($id);

            // Обработка формы
            if (isset($_POST['submit'])) {
                
                $options['name'] = $_POST['name'];

                Dep::updateDepById($id, $options);
                
                header("Location: /admin/dep/");
            }

            require_once(ROOT . '/views/admin_dep/update.php');
            return true;
        }

        public function actionDelete($id) {
            
            // Обработка формы
            if (isset($_POST['submit'])) {
                $errors = false;

                if (Dep::getEqCountInDep($id) != 0) {
                    $errors[] = 'В департаменте есть оборудование. Удалить нельзя.';
                }

                if ($errors == false) {
                    Dep::deleteDepById($id);

                    header("Location: /admin/dep/");
                }
            }

            require_once(ROOT . '/views/admin_dep/delete.php');
            return true;
        }

    }
?>