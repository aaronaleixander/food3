<?php
/* model/validate.php
 * Contains validation for food application
 */

/** validFood() returns true if is not empty and contains only letters */
function validFood($food){
    // $validFoods = array("a", "b", "c");


    return !empty($food) && ctype_alpha($food);
}