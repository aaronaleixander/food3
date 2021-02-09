<?php
// CONTROLLER
// turn on error reporting
ini_set('display_error', 1);
error_reporting(E_ALL);

// Start a session
session_start();

// require the autoload file
require_once('vendor/autoload.php');

// create an instance of the base class
$f3 = Base::instance();

// Define a default route
$f3->route('GET /' , function(){
    // fat free - taking the view page and rendering it in the browser
    $view = new Template();
    echo $view->render('/views/home.html');
});

// Define an order route
$f3->route('GET /order' , function(){
    $view = new Template();
    echo $view->render('/views/form1.html');
});

// Define an order2 route
$f3->route('POST /order2' , function(){
    var_dump($_POST); // first page getting data
    if(isset($_POST['food'])){
        $_SESSION['food'] = $_POST['food'];
    }
    if(isset($_POST['meal'])){
        $_SESSION['meal'] = $_POST['meal'];
    }
    //Display a view
    $view = new Template();
    echo $view->render('/views/form2.html');
});

// Define an order route
$f3->route('POST /summary' , function(){
    //echo "<p>POST:</p>";
    var_dump($_POST);

    //echo "<p>SESSION:</p>";
    //var_dump($_SESSION);

    if(isset($_POST['conds'])){
        $_SESSION['conds'] = implode(", ",$_POST['conds']);
    }

    $view = new Template();
    echo $view->render('/views/summary.html');
});

// Run fat free
$f3->run();