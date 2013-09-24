<?php
$pageTitle = "New Expense";
include 'includes/header.php';
?>

<div class="hero-unit  offset1 span10">
<h1><?= $pageTitle; ?></h1>
  <?php 
    $date = trim($_POST['date']);
   	$date =  htmlspecialchars(str_replace('!', '', $date), ENT_QUOTES);
    $product = trim($_POST['product']);
    $product =  htmlspecialchars(str_replace('!', '', $product), ENT_QUOTES);
	$expense = ltrim($_POST['expense'], '0');
    $expense =  htmlspecialchars(str_replace('!', '', $expense), ENT_QUOTES);
	/*$category = trim($_POST['category']);
    $category =  htmlspecialchars(str_replace('!', '', $category), ENT_QUOTES);*/
	$category = (int)$_POST['category'];
    $error=false;
	
    if(mb_strlen($product)<4){
        echo '<p class="lead">The product name is too short.</p>';
		header("refresh:3;url=index.php");
        $error=true;
    }
	
    if(!is_numeric($expense) || floatval($expense) > 10000000 || floatval($expense) < 0.01){
        echo '<p class="lead">Invalid expense.</p>';
		header("refresh:3;url=index.php");
        $error=true;
    }
    
    if(!$error){
        $result = $date.'!'.$product.'!'.$expense.'!'.$category."\n";
		
		$row = $_POST['row'];
		$data = 'data.txt';
		$fileConteiner = file($data);
		$rowToEdit = $fileConteiner[$row];
		$fileContent = str_replace($rowToEdit, $result, file_get_contents($data));
    	file_put_contents($data, $fileContent);
        
            echo '<p class="lead">"'.$product.'" successfuly edited.</p>';
			header("refresh:2;url=index.php");        
    } ?>
</div>
<?php
	include 'includes/footer.php';      
?>