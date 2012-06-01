<?php
    error_reporting(E_ALL);
    ini_set('display_errors','On');
    require_once('application/Router.php');
    require_once('application/Registry.php');
    require_once('application/Template.php');
    require_once('application/database.class.php'); 

    global $database;
    $router = new Router();
    $registry = new Registry();
    $database = new DB("membership", "localhost", "root","");     
    $registry->template = new Template();

    $router->route($registry);

    /*** auto load model classes ***/
    function __autoload($class_name)
    {
        try
        {
            $filename = strtolower($class_name) . '.php';
            $file = 'application/models/' . $filename;

            if (file_exists($file))
                include ($file);
            else
                throw new Exception('model ' . $class_name . '.php not found');
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
            exit(0);
        }
    }
