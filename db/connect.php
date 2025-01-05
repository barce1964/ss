<?php
    class DB {
        public $host = 'localhost';
        public $db = 'ss';
        public $user = 'alex';
        public $pwd = 'Ale20X10v19T1964_ex10';

        public function getSelection($qry) {
            
            $db = mysqli_connect($this->host, $this->user, $this->pwd, $this->db) 
                or die("Ошибка " . mysqli_error($db));
            
                $result = mysqli_query($db, $qry)
                    or die("Ошибка " . mysqli_error($db));
                mysqli_close($db);
                return mysqli_fetch_row($result);
        }

        public function executeQry($qry, $idx) {
            
            $db = mysqli_connect($this->host, $this->user, $this->pwd, $this->db) 
                or die("Ошибка " . mysqli_error($db));

            $result = mysqli_query($db, $qry)
                or die("Ошибка " . mysqli_error($db));
            $i = 0;
            
            switch ($idx) {
                case 1:
                    $returnList = array();
                    while ($row = mysqli_fetch_row($result)) {
                        $returnList['id_user'] = $row[0];
                        $returnList['id_city'] = $row[1];
                        $returnList['id_role'] = $row[2];
                        $returnList['name_user'] = $row[3];
                        $returnList['user_firstname'] = $row[4];
                        $returnList['user_lastname'] = $row[5];
                        $returnList['pwd_user'] = $row[6];
                        $returnList['user_cif'] = $row[7];
                        $returnList['user_iv'] = $row[8];
                        $returnList['user_key'] = $row[9];
                    }
                    break;

                    case 2:
                        // $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList = $row[0];
                        }
                        break;

                    case 3:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i]['id_type'] = $row[0];
                            $returnList[$i]['name_type'] = $row[1];
                            $i++;
                        }
                        break;

                    case 4:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i]['id_role'] = $row[0];
                            $returnList[$i]['name_role'] = $row[1];
                            $i++;
                        }
                        break;

                    case 5:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i]['id_user'] = $row[0];
                            $returnList[$i]['name_user'] = $row[1];
                            $returnList[$i]['user_firstname'] = $row[2];
                            $returnList[$i]['user_lastname'] = $row[3];
                            $returnList[$i]['name_role'] = $row[4];
                            $returnList[$i]['name_city'] = $row[5];
                            $i++;
                        }
                        break;
    
                    case 6:
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList = $row[0];
                        }
                        break;

                    case 7:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList['id_type'] = $row[0];
                            $returnList['name_type'] = $row[1];
                        }
                        break;

                    case 8:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i]['id_eq'] = $row[0];
                            $returnList[$i]['name_type'] = $row[1];
                            $returnList[$i]['name_eq'] = $row[2];
                            $returnList[$i]['eq_units'] = $row[3];
                            $i++;
                        }
                        break;

                    case 9:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList['id_eq'] = $row[0];
                            $returnList['name_type'] = $row[1];
                            $returnList['name_eq'] = $row[2];
                            $returnList['eq_units'] = $row[3];
                        }
                        break;

                    case 10:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i] = $row[0];
                            $i++;
                        }
                        break;

                    case 11:
                        $row = mysqli_fetch_row($result);
                        $returnList = $row[0];
                        break;

                    case 12:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i]['name_eq'] = $row[0];
                            $returnList[$i]['eq_quantity'] = $row[1];
                            $returnList[$i]['eq_units'] = $row[2];
                            $i++;
                        }
                        break;
                    
                    case 13:
                        $returnList = array();
                        while ($row = mysqli_fetch_row($result)) {
                            $returnList[$i]['id_place'] = $row[0];
                            $returnList[$i]['id_city'] = $row[1];
                            $returnList[$i]['name_place'] = $row[2];
                            $i++;
                        }
                        break;
    
    
                default:
                    # code...
                    break;
            }
            mysqli_close($db);
            return $returnList;
        }

        public function insertRowToDB($qry) {
            $con = mysqli_connect($this->host, $this->user, $this->pwd, $this->db) 
                or die("Ошибка " . mysqli_error($con));

            return mysqli_query($con, $qry)
                or die("Ошибка " . mysqli_error($con));
            
        }

        public function updateRowInTable($qry) {
            $con = mysqli_connect($this->host, $this->user, $this->pwd, $this->db) 
                or die("Ошибка " . mysqli_error($con));

            return mysqli_query($con, $qry)
                or die("Ошибка " . mysqli_error($con));
        }

        public function deleteRowFromTable($qry) {
            $con = mysqli_connect($this->host, $this->user, $this->pwd, $this->db) 
                or die("Ошибка " . mysqli_error($con));

            return mysqli_query($con, $qry)
                or die("Ошибка " . mysqli_error($con));
        }

        public function lastInsertIdEq() {
            $con = mysqli_connect($this->host, $this->user, $this->pwd, $this->db) 
                or die("Ошибка " . mysqli_error($con));

            $qry = 'SELECT MAX(id_eq) FROM ss_eq';
            
            $result = mysqli_query($con, $qry)
                or die("Ошибка " . mysqli_error($con));

            $row = mysqli_fetch_row($result);
            return $row[0];
        }
    }


    
?>