<?php
/* model/validate.php
 * Contains validation for food application
 */


// creating a validate class for our validation methods
class Validate
{
    /** validFood() returns true if is not empty and contains only letters */
    function validFood($food)
    {
        // $validFoods = array("a", "b", "c");


        return !empty($food) && ctype_alpha($food);
    }

    /**
     * ValidMeal() returns true if the selected meal is in the list of valid options
     *
     */
    function validMeal($meal)
    {
        return in_array($meal, getMeals());
    }

    /**
     * validCondiments() returns true of all selected condiments are valid
     */
    function validCondiments($selectedConds)
    {
        $validConds = getCondiments();
        foreach ($selectedConds as $selected) {
            if (!in_array($selected, $validConds)) {
                return false;
            }
        }
        return true;
    }
}