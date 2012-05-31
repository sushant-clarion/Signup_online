<?php
    class TestModel
    {
        private $testData = 'data from the model';
        static $instance;

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
            return $this->testData;
        }
    }
?>
