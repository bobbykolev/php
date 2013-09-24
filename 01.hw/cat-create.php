<?php 
$pageTitle = "Create New Category";
include 'includes/header.php';
?>
<div class="hero-unit offset1 span5">
<?php if($_POST){
    $newCategory = htmlspecialchars(trim($_POST['category']));    
    $error=false;
	
    if(mb_strlen($newCategory)<4){
        echo '<p class="lead">The category name is too short.</p>';
		header("refresh:2;url=create-category.php");
        $error=true;
    }
	if(is_numeric($newCategory[0])){
        echo '<p class="lead">The category name cannot start with number.</p>';
		header("refresh:2;url=create-category.php");
        $error=true;
    }
        foreach($categories as $val){
			if(strtolower($val) == strtolower($newCategory))
			{
				echo '<p class="lead">The category already exist.</p>';
				header("refresh:2;url=create-category.php");
				$error=true;
			}
			}
    if(!$error){
			$file = fopen("includes/constants.php", "a");
    		$newdata =  'array_push($categories, "'.ucfirst(strtolower($newCategory)).'");';
    		fwrite($file, $newdata);
    		fclose($file);
            echo '<p class="lead">'.$newCategory.' successfuly added.';
			header("refresh:1;url=index.php");
    }
}
?>
</div>
<?php 
include 'includes/footer.php';
?>