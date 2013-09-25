<?php
$pageTitle = "New Expense";
include 'includes/header.php';
?>

<div class="hero-unit offset1 span10">
<h1><?= $pageTitle; ?></h1>
  <?php 
  //Here I use the function edit_create(...) from constants.php file to avoid code repeating
    $postData = edit_create( $_POST['date'],  $_POST['product'],  $_POST['expense'],  $_POST['category']);
	
    if(mb_strlen($postData[1])<4){
        echo '<p class="lead">The product name is too short.</p>';
		header("refresh:3;url=index.php");
        $postData[4]=true;
    }
	
    if(!is_numeric($postData[2]) || floatval($postData[2]) > 10000000 || floatval($postData[2]) < 0.01){
        echo '<p class="lead">Invalid expense.</p>';
		header("refresh:3;url=index.php");
        $postData[4]=true;
    }
    
    if(!$postData[4]){
        $result = $postData[0].'!'.$postData[1].'!'.$postData[2].'!'.$postData[3]."\n";
		
		$row = $_POST['row'];
		$data = 'data.txt';
		$fileConteiner = file($data);
		$rowToEdit = $fileConteiner[$row];
		$fileContent = str_replace($rowToEdit, $result, file_get_contents($data));
    	file_put_contents($data, $fileContent);
        
            echo '<p class="lead">"'.$postData[1].'" successfuly edited.</p>';
			header("refresh:2;url=index.php");        
    } ?>
</div>
<?php
	include 'includes/footer.php';      
?>