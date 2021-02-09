<?php
/*
 * MODEL
 * model/data-layer.php
 * Returns data for my food 3 web application
 */

/*
 * this function will get a list of meals
 */
function getMeals(){
    return array("breakfast", "2nd Breakfast", "lunch", "dinner");
}

/*
 * This function will return an array of condiments
 */
function getCondiments(){
    return array("ketchup", "ranch", "mustard", "sriacha", "red hot", "kim chee", "mayo");
}
