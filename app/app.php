<?php

<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Students.php";
    require_once __DIR__."/../src/Courses.php";


    // NEW SILEX
    $app = new Silex\Application();
    // turn on debug
    $app['debug'] = true;

    // log in for sql myphp admin
    $server = 'mysql:host=localhost;dbname=to_do';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    // install for twig
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    //overides http to use symfony that is part of composer 
    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();








?>
