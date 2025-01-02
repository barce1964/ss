<?php

    include_once ROOT . '/models/User.php';
    
    class AdminRoleController extends AdminBase {

        
        public function actionIndex() {
            
            $rolesList = User::getRolesList();
            
            require_once(ROOT . '/views/admin_role/index.php');
            return true;
        }

        public function actionCreate() {
            
            $depList = Dep::getDepList();

            if (isset($_POST['submit'])) {
                
                $options['id_dep'] = $_POST['id_dep'];
                $options['name_role'] = $_POST['name_role'];

                $errors = false;
                
                if (!isset($options['name_role']) || empty($options['name_role'])) {
                    $errors[] = 'Заполните поле';
                }
                echo $errors;
                if ($errors == false) {
                    $id = User::createRole($options);

                    header("Location: /admin/role");
                }
            }

            require_once(ROOT . '/views/admin_role/create.php');
            return true;
        }

        
        public function actionUpdate($id) {
            
            $depList = Dep::getDepList();
            $role = User::getRoleById($id);

            // Обработка формы
            if (isset($_POST['submit'])) {
                
                $options['id_dep'] = $_POST['id_dep'];
                $options['name_role'] = $_POST['name_role'];

                User::updateRoleById($id, $options);
                
                header("Location: /admin/role/");
            }

            require_once(ROOT . '/views/admin_role/update.php');
            return true;
        }

        public function actionDelete($id) {
            
            // Обработка формы
            if (isset($_POST['submit'])) {

                User::deleteRoleById($id);

                header("Location: /admin/role/");
            }

            require_once(ROOT . '/views/admin_role/delete.php');
            return true;
        }

    }
?>
