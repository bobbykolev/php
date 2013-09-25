<?php
//This function used by edit and create is for avoiding code repeating.
function edit_create( $postDate,  $postProduct,  $postExpense,  $postCategory){
 	$date = trim($postDate);
    $date =  htmlspecialchars(str_replace('!', '', $date), ENT_QUOTES);
    $product = trim($postProduct);
    $product =  htmlspecialchars(str_replace('!', '', $product), ENT_QUOTES);
	$expense = ltrim($postExpense, '0');
    $expense =  htmlspecialchars(str_replace('!', '', $expense), ENT_QUOTES);
	$category = (int)$postCategory;
    $error=false;
	return array($date, $product, $expense, $category, $error);
}

$categories = array(1=>'Fruits', 2=>'Vegetables',
    3=>'Roots', 4=>'Hurbs', 5=>'Other', 6=>'Nuts');
array_push($categories, "Sdfsdf#&lt;br&gt;t");