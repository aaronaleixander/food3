<?php
/* model/validate.php
 * Contains validation for food application
 */

/** validFood() returns true if is not empty */
function validFood($food){
    // $validFoods = array("a", "b", "c");
    return !empty(trim($food));
}