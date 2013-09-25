<?php
//This function used by edit and create is for avoiding code repeating.
function edit_create($postDate, $postProduct, $postExpense, $postCategory)
{
    $date     = trim($postDate);
    $date     = htmlspecialchars(str_replace('!', '', $date), ENT_QUOTES);
    $product  = trim($postProduct);
    $product  = htmlspecialchars(str_replace('!', '', $product), ENT_QUOTES);
    $expense  = ltrim($postExpense, '0');
    $expense  = htmlspecialchars(str_replace('!', '', $expense), ENT_QUOTES);
    $category = (int) $postCategory;
    $error    = false;
    return array(
        $date,
        $product,
        $expense,
        $category,
        $error
    );
}
function isValidDate($date)
{
    if (preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $date, $matches)) {
        if (checkdate($matches[2], $matches[3], $matches[1])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

$categories = array(
    1 => 'Fruits',
    2 => 'Vegetables',
    3 => 'Roots',
    4 => 'Herbs',
    5 => 'Other',
    6 => 'Nuts'
);
array_push($categories, "Sdfsdf#&lt;br&gt;t");