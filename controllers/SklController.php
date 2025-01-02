<?php
    class SklController {

        public function actionComein() {

            require_once(ROOT . '/views/skl/comein.php');
            return true;

        }

        public function actionGoout() {

            require_once(ROOT . '/views/skl/goout.php');
            return true;

        }
    }
?>