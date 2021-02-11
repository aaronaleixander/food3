<?php
// CONTROLLER
// turn on error reporting
ini_set('display_error', 1);
error_reporting(E_ALL);

// Start a session
session_start();

// require the autoload files
require_once('vendor/autoload.php');
require_once('model/data-layer.php');
require_once('model/validate.php');

// create an instance of the base class
$f3 = Base::instance();

// Define a default route
$f3->route('GET /' , function(){
    // fat free - taking the view page and rendering it in the browser
    $view = new Template();
    echo $view->render('/views/home.html');
});

// Define an order route
$f3->route('GET|POST /order' , function($f3){


    // if the form has been submitted - validation
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // get the data from the post array
        $userFood = trim($_POST['food']);
        $userMeal = trim($_POST['meal']);

        // if the data is valid - store in the session
        if(validFood($userFood)){
            $_SESSION['food'] = $userFood;
        } else { // if the data is not valid -> set an error in F3 hive
            $f3->set('errors["food"]', "Food cannot be blank and must not contain numbers");
        }

        if(isset($_POST['meal'])){
            $_SESSION['meal'] = $_POST['meal'];
        }

        // if no errors redirect to order 2 route --- GET|POST is essential
        if(empty($f3->get('errors'))){
            $f3->reroute('/order2');
        }
    }

    $f3->set('meals', getMeals());
    $f3->set('userFood', isset($userFood) ? ($userFood) : "");

    $view = new Template();
    echo $view->render('/views/form1.html');
});

// Define an order2 route
$f3->route('GET|POST /order2' , function($f3){
    // HIVE
    $f3->set('condiments', getCondiments());

    //var_dump($_POST); // first page getting data


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