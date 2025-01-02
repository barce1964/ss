<?php
    class ProjectsController {

        public function actionNew() {


            $placeList = Place::getListPlace();

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
        
        public function actionTours() {

            require_once(ROOT . '/views/projects/tours.php');
            return true;

        }
    }
?>