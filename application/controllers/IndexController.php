<?php
    class IndexController extends BaseController
    {
        public function index()
        {
            $this->registry->template->contents = "<a href='registration'>Sign Up</a>";
            $this->registry->template->show('indexView.php');
        }

        private function getModelData()
        {
            $model = TestModel::getInstance();
            return $model->getData();
        }
    }
?>
