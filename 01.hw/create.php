<?php
$pageTitle = "New Expense";
include 'includes/header.php';
?>

<div class="hero-unit">
<h1><?= $pageTitle; ?></h1>
  <?php 
    $date = trim($_POST['date']);
    $date =  htmlspecialchars(str_replace('!', '', $date), ENT_QUOTES);
    $product = trim($_POST['product']);
    $product =  htmlspecialchars(str_replace('!', '', $product), ENT_QUOTES);
	$expense = ltrim($_POST['expense'], '0');
    $expense =  htmlspecialchars(str_replace('!', '', $expense), ENT_QUOTES);
	/*?>$category = trim($_POST['category']);
    $category =  htmlspecialchars(str_replace('!', '', $category), ENT_QUOTES);<?php */
	$category = (int)$_POST['category'];
    $error=false;
	
    if(mb_strlen($product)<4){
        echo '<p class="lead">The product name is too short.</p>';
		header("refresh:2;url=create-expense.php");
        $error=true;
    }
	    
    if(!is_numeric($expense) || floatval($expense) > 10000000 || floatval($expense) < 0.01){
        echo '<p class="lead">Invalid expense.</p>';
		header("refresh:2;url=create-expense.php");
        $error=true;
    }
    
    if(!$error){
        $result = $date.'!'.$product.'!'.$expense.'!'.$category."\n";
        if(file_put_contents('data.txt', $result,FILE_APPEND))
        {
            echo '<p class="lead">"'.$product.'" successfuly added.</p>';
			header("refresh:1;url=index.php");
        }
    } ?>
</div>
<?php
	include 'includes/footer.php';      
?>
