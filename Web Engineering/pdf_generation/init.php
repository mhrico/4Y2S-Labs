<?php

    use Bookstore\Domain\Book; 
    use Bookstore\Domain\Customer;
    use Bookstore\Utils\Config;

    function autoloader($classname){
        $lastSlash = strpos($classname, '\\') + 1;
        $classname = substr($classname, $lastSlash);
        $directory = str_replace('\\', '/', $classname);
        $filename = __DIR__ . '/src/' . $directory . '.php';
        require_once($filename); 
    }

    spl_autoload_register('autoloader');

    $config	= Config::getInstance(); 
    $dbConfig =	$config->get('db');

    $db	= new PDO(
        'mysql:host=127.0.0.1;dbname=bookstore',
        $dbConfig['user'],
        $dbConfig['password']
    );

    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,	PDO::FETCH_ASSOC); 
