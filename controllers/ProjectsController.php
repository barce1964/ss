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
        
        public function actionOrd() {
            require_once(ROOT . '/views/projects/ord.php');
            return true;
        }

        public function actionTours() {

            require_once(ROOT . '/views/projects/tours.php');
            return true;

        }
    }
?>