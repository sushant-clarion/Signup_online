<?php      
    class RegistrationModel 
    {
        private $testData = 'Registration';
        static $instance;  
        private $unique_id;
        

        public static function getInstance()
        {
            if(self::$instance ==  null)
                self::$instance = new self();
            return self::$instance;
        }

        private function __construct(){}
        private function __clone(){}

        public function getData()
        {
            global $database;
            $Query = "SELECT * FROM additional_services ORDER BY order_by";
            $database->query($Query);
            $data = array();
            while ($row = $database->fetchNextObject()){
                $data[$row->is_child_care][]= $row;
            } 
            return $data;
        }
        
        /*
        * To add data into the database
        */
        public function save(){
            $response              = array("member_id"=>"", "unique_id"=>"");
            $response['member_id'] = $this->createMember($_POST);
            $response['unique_id'] = $this->aMemberSubscription($_POST);
            return $response;
        }
        
        public function payment(){
            $response                   = array("id"=>"", "transaction_id"=>"");
            $response['id']             = $this->createTransaction($_POST);
            
            if ($response['id']){
                $response['transaction_id'] = $this->aMemberTransaction($_POST);  
            }
            
            if ($response['transaction_id'] != ""){
                $this->updateTransaction($response['id'], $response['transaction_id']);
                return true;
            }
            return false;
        }
        
        private function createMember($data){
            global $database;
            $bDate  = $data['birth_year']."-".$data['birth_month']."-".$data['birth_day'];
            $Query  = "INSERT INTO primary_member ";
            $Query .= "(member_first_name, member_last_name, club_membership_status, member_birth_date, ";
            $Query .= "member_gender, member_address1, member_address2, member_city, ";
            $Query .= "member_state, member_zip, member_phone, member_email)";
            $Query .= "VALUES ('".$data['fname']."', '".$data['lname']."','".$data['product_id']."', '$bDate', ";
            $Query .= "'".$data['gender']."', '".$data['address1']."', '".$data['address2']."', '".$data['city']."', ";
            $Query .= "'".$data['state']."', '".$data['zip']."', '".$data['phone']."', '".$data['email']."')";
            //echo$Query;
            $database->query($Query);
            $member_id = $database->lastInsertedId();
            return $member_id;
        }
        
        private function createTransaction($data){
            global $database; 
            $Query  = "INSERT INTO transaction ";
            $Query .= "(";
            $Query .=   "member_id, amount, transaction_date";
            $Query .= ") ";
            $Query .= "VALUES (";
            $Query .=   "'".$data['member_id']."', '20', UNIX_TIMESTAMP()";
            $Query .= ")";
            $database->query($Query);
            $id     = $database->lastInsertedId();
            return $id;
        }
        
        private function updateTransaction($id, $tran_id){
            global $database;
            $Query  = "UPDATE transaction SET transaction_id = '$tran_id', trasaction_status = 'S' WHERE id = $id";
            $database->query($Query);
            return true;
        }
        
        /*
        * Create use on aMember
        */
        private function aMemberSubscription($data){
            $urltopost = "http://d5e8dce.amdemo.com/signup";
            $datatopost = array (
            "name_f"            => $data['fname'],
            "name_l"            => $data['lname'],
            "product_id"        => $data['product_id'],
            "gender"            => $data['gender'],
            "birthdate"         => $data['birth_year']."-".$data['birth_month']."-".$data['birth_day'],
            "street"            => $data['address1'].", ".$data['address2'],
            "city"              => $data['city'],
            "zip"               => $data['zip'],
            "country"           => 'US',
            "state"             => $data['state'],
            "phone"             => $data['phone'],
            "email"             => $data['email'],
            "product_id_1[7]"   => isset($data['addtional_service_1']) ? $data['addtional_service_1'] : "",
            "product_id_1[8]"   => isset($data['addtional_service_2']) ? $data['addtional_service_2'] : "",
            //"paysys_id"         => "cc-demo",
            "paysys_id"         => "authorize-cim",
            "_save_"            => "page-0",
            "_qf_page-0_next"   => "Next",
            );
            
            $child_1 = array();
            if ($data['child_1_fname'] != "" && $data['child_1_lname'] != "" && $data['child_1_age'] != ""){
                $child_1 = array (
                    "product_id_2[13]"  => 13,
                    "child_1_fname"     => $data['child_1_fname'],
                    "child_1_lname"     => $data['child_1_lname'],
                    "child_1_age"       => $data['child_1_age'],
                );
                $datatopost = array_merge($datatopost,$child_1);
            }
            
            $child_2 = array();
            if ($data['child_2_fname'] != "" && $data['child_2_lname'] != "" && $data['child_2_age'] != ""){
                $child_2 = array (
                    "product_id_2[14]"  => 14,
                    "child_2_fname"     => $data['child_2_fname'],
                    "child_2_lname"     => $data['child_2_lname'],
                    "child_2_age"       => $data['child_2_age'],
                );
                $datatopost = array_merge($datatopost,$child_2);
            }
            
            $child_3 = array();
            if ($data['child_3_fname'] != "" && $data['child_3_lname'] != "" && $data['child_3_age'] != ""){
                $child_3 = array (
                    "product_id_2[15]"  => 15,
                    "child_3_fname"     => $data['child_3_fname'],
                    "child_3_lname"     => $data['child_3_lname'],
                    "child_3_age"       => $data['child_3_age'],
                );
                $datatopost = array_merge($datatopost,$child_3);
            }
            
            //var_dump($datatopost);exit;
            $ch = curl_init ($urltopost);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt ($ch, CURLOPT_HEADER, false);
            curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt ($ch, CURLOPT_ENCODING, "");
            curl_setopt ($ch, CURLOPT_AUTOREFERER, true);
            
            curl_setopt ($ch, CURLOPT_POST, true);
            curl_setopt ($ch, CURLOPT_POSTFIELDS, $datatopost);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            $returndata = curl_exec ($ch);
            
            $start = strpos($returndata,'id="id-0" value="');
            if (trim($start) != ""){
                $start += 17;
                $this->unique_id = substr($returndata,$start,22);
                curl_close( $ch );
                echo "<BR>",print_r($returndata);exit;
                return $this->unique_id;
            }else{
                return 0;
            }
        }
        
        /*
        * Create use on aMember
        */
        private function aMemberTransaction($data){
            //$urltopost = "http://d5e8dce.amdemo.com/payment/cc-demo/cc";
            $urltopost = "http://d5e8dce.amdemo.com/payment/authorize-cim/cc";
            $datatopost = array (
                "cc_name_f" => $data['pay_fname'],
                "cc_name_l" => $data['pay_lname'],
                "cc_type" => $data['card_type'],
                "cc_number" => $data['card_number'],
                "cc_expire[m]" => $data['exp_month'],
                "cc_expire[y]" => $data['exp_year'],
                "cc_code" => $data['cvv_number'],
                "country" => "US",
                "state" => $data['state'],
                "cc_street" => $data['address'],
                "cc_city" => $data['city'],
                "cc_zip" => $data['zip'],
                "action" => "cc",
                "_save_" => "cc",
                "_cc_" => "    Subscribe And Pay    ",
                "id" => $data['unique_id'],           
            );
            //var_dump($datatopost);exit;
            $ch = curl_init ($urltopost);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt ($ch, CURLOPT_HEADER, false);
            curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt ($ch, CURLOPT_ENCODING, "");
            curl_setopt ($ch, CURLOPT_AUTOREFERER, true);
            
            curl_setopt ($ch, CURLOPT_POST, true);
            curl_setopt ($ch, CURLOPT_POSTFIELDS, $datatopost);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            $returndata = curl_exec ($ch);
            $start = strpos($returndata,'Order reference:');
            $end   = strpos($returndata,'Date and time of payment:');
            $len   = $end - $start;
            $tran_id = str_replace("Order reference:","",substr($returndata,$start,$len));
            return trim(strip_tags($tran_id));
            //echo "<BR>",print_r($returndata);exit;
        }
    }
?>
