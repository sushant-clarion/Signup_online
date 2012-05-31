<?php

    class Router
    {
        private $path, $controller, $action;
        static $instance;

        public function __construct()
        {
            $request = isset($_GET['request']) ? $_GET['request'] : "";
            $split = explode('/',trim($request,'/'));

            $this->controller = !empty($split[0]) ? ucfirst($split[0]) : 'Index';
            $this->action = !empty($split[1]) ? $split[1] : 'index';
        }

        public function route($registry)
        {
            require_once('application/BaseController.php');
            $file = 'application/controllers/' . $this->controller . 'Controller.php';
            if(is_readable($file))
            {
                include $file;
                $class = $this->controller . 'Controller';
            }
            else
            {
                include 'application/controllers/Error404Controller.php';
                $class = 'Error404Controller';
            }
            $controller = new $class($registry);

            if (is_callable(array($controller, $this->action)))
                $action = $this->action;
            else
                $action = 'index';
            $controller->$action();
        }
    }
?>