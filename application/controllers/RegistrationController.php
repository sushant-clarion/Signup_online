<?php
    class RegistrationController extends BaseController
    {
        public function index()
        {
            if (isset($_POST['btnRegistration']) && $_POST['btnRegistration'] == "save"){
                $this->registry->template->state        = $_POST['state'];
                $this->registry->template->city         = $_POST['city'];
                $this->registry->template->zip          = $_POST['zip'];
                $this->registry->template->address      = $_POST['address1'].", ".$_POST['address2'];
                $response                               = $this->bind();
                $this->registry->template->unique_id    = $response['unique_id'];
                $this->registry->template->member_id    = $response['member_id'];
                $this->registry->template->data         = $this->getModelData(); 
                if ($response['unique_id'] == 0){
                    $this->registry->template->errMsg   = "An account with the same email already exists.";
                    $this->registry->template->contents = $this->registry->template->partial('registrationView.php');
                }else{
                    $this->registry->template->contents     = $this->registry->template->partial('paymentView.php');
                }
                
                $this->registry->template->show('indexView.php');
            }elseif (isset($_POST['btnPayment']) && $_POST['btnPayment'] == "save"){
                $transaction                            = $this->doPayment();
                $this->registry->template->data         = $this->getModelData();
                $this->registry->template->contents = $this->registry->template->partial('successView.php');
                $this->registry->template->show('indexView.php');  
            }else{
                $this->registry->template->data = $this->getModelData();
                //var_dump($this->registry->template->contents);
                $this->registry->template->contents = $this->registry->template->partial('registrationView.php');
                $this->registry->template->show('indexView.php');
            }
        }

        private function getModelData()
        {
            $model = RegistrationModel::getInstance();
            $data = $model->getData();   
            return $data;
        }
        
        private function bind(){
            $model = RegistrationModel::getInstance();
            return $model->save();
        }
        private function doPayment(){
            $model = RegistrationModel::getInstance();
            return $model->payment();
        }
    }
?>
