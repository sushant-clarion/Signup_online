<?php
    class RegistrationController extends BaseController
    {
        public function index()
        {
            if (isset($_POST['btnRegistration']) && $_POST['btnRegistration'] == "save"){ 
                $this->bind();                                                            
                $this->registry->template->data = $this->getModelData(); 
                $this->registry->template->contents = $this->registry->template->partial('paymentView.php');
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
    }
?>
