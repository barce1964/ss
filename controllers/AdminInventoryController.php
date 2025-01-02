<?php

    
    include_once ROOT . '/models/User.php';
    

    class AdminInventoryController extends AdminBase {

        public function actionNew() {

            $eqList = Eq::getEqList();
            $idInv = Inventory::addInventory();
            // print_r($_POST);
            // echo '<br>' . count($_POST);
            if (isset($_POST['submit'])) {
                $idInv = $_POST['id_inv'];
                for ($i=1; $i<=count($_POST)-2; $i++) {
                    if ($_POST["quantity$i"] != '') {
                        $options['id_inv'] = $idInv;
                        $options['id_eq'] = $i;
                        $options['q'] = $_POST["quantity$i"];
                        Inventory::clearTableBase($i);
                        Inventory::addEq($options);
                    }
                }
                Inventory::closeInventory($idInv);
                header("Location: /admin");
            }

            require_once(ROOT . '/views/admin_inventory/new.php');
            return true;

        }

        public function actionLast() {
            $dateInventory = Inventory::getDateOfLastInventory();
            $dateInventory = Inventory::getDateFormat($dateInventory);
            $invList = Inventory::getInvList();

            if (isset($_POST['submit'])) {
                header("Location: /admin");
            }

            require_once(ROOT . '/views/admin_inventory/last.php');
            return true;
        }

        public function actionField() {
            require_once(ROOT . '/views/admin_inventory/last.php');
            return true;
        }
    }
?>