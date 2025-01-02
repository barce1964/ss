<?php
    class RepairController {

        public function actionIn() {

            require_once(ROOT . '/views/repair/in.php');
            return true;

        }

        public function actionNeed() {

            require_once(ROOT . '/views/repair/need.php');
            return true;

        }
    }
?>