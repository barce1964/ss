<?php
    class ProjectsController {

        public function actionNew() {


            $placeList = Place::getListPlace();

            if (isset($_POST['submit'])) {
                if ($_POST['submit'] == 'Создать') {
                    $options['id_place'] = $_POST['id_place'];
                    $options['name_project'] = $_POST['nameP'];
                    $options['date_ord'] = $_POST['dateP'];
                    Projects::addProject($options);
                    $id = Projects::getLastLine();
                    header("location: /projects/ord/$id/1");
                }
                if ($_POST['submit'] == 'Отменить') {
                    header("location: /");
                }    
            }
            
            require_once(ROOT . '/views/projects/new.php');
            return true;

        }

        public function actionAddplace() {
            if (isset($_POST['submit'])) {
                if ($_POST['submit'] == 'submit') {
                    Place::addPlace($_SESSION['city'], $_POST['nameplace']);
                    header("location: /projects/new");
                } else {
                    header("location: /projects/new");
                }
            }
            require_once(ROOT . '/views/projects/addcityn.php');
            return true;
        }
        
        public function actionOrd($id_ord, $id_type) {
            $typeList = Type::getTypeList();
            $eqList = Projects::getListEqByType($id_type);
            $maxIdEq = Projects::getMaxIdEq();
            if (isset($_POST['submit'])) {
                if($_POST['submit'] == "Сохранить") {
                    for ($i = 1; $i <= $maxIdEq; $i++) {
                        if ((isset($_POST["quantity$i"])) && ($_POST["quantity$i"] != '')) {
                            $options['id_prj'] = $id_ord;
                            $options['id_eq'] = $i;
                            $options['eq_quantity'] = $_POST["quantity$i"];
                            Projects::addEqInPrj($options);
                        }
                    }
                }
                if($_POST['submit'] == "Закончить") {
                    for ($i = 1; $i <= $maxIdEq; $i++) {
                        if ((isset($_POST["quantity$i"])) && ($_POST["quantity$i"] != '')) {
                            $options['id_prj'] = $id_ord;
                            $options['id_eq'] = $i;
                            $options['eq_quantity'] = $_POST["quantity$i"];
                            Projects::addEqInPrj($options);
                        }
                    }
                    Projects::rPrj($id_ord);
                    header("location: /projects/ready/$id_ord");
                }
            }
            require_once(ROOT . '/views/projects/ord.php');
            return true;
        }

        public function actionReady($id_ord) {
            $prjList = Projects::getPrjList();
            $prjDetail = Projects::getPrjDetail($id_ord);
            require_once(ROOT . '/views/projects/ready.php');
            return true;
        }

        public function actionTours() {

            require_once(ROOT . '/views/projects/tours.php');
            return true;

        }
    }
?>