    
<?php    
    include_once ROOT . '/models/Dep.php';
    include_once ROOT . '/models/Type.php';
    include_once ROOT . '/models/Eq.php';

    class StatController {
        public function actionIndex() {
        
            if (!User::isGuest()) {
                $userId = $_SESSION['user'];
                $depList = Dep::getDepListByUser($userId);
                $roles = User::getUserRoles($userId);
                $depList = Dep::getDepListByUser($userId);

                if ($_SESSION['adm'] == 0) {
                    $option['id_dep'] = $depList[0]['id_dep'];
                    $options['id_dep'] = (isset($_POST['id_dep'])) ? (int)$_POST['id_dep'] : $depList[0]['id_dep'];
                } else {
                    $options['id_dep'] = (isset($_POST['id_dep'])) ? (int)$_POST['id_dep'] : 0;
                }
            } else {
                $depList = Dep::getDepList();
            }

            // $options['id_dep'] = (isset($_POST['id_dep'])) ? (int)$_POST['id_dep'] : 1;
            $_SESSION['dep_stat'] = $options['id_dep'];

            $statList = Eq::getStatEqList($options);

            require_once(ROOT . '/views/stat/index.php');

            return true;
        }

    }

?>