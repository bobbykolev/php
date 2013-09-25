<?php
$pageTitle = "Create New Category";
include 'includes/header.php';
?>
<div class="hero-unit offset1 span5">
<h1><?= $pageTitle; ?></h1>
<form method="POST" action="cat-create.php">   
    <div><label class="label label-success" for="catId">Add Category: </label>
    <input type="text" id="catId" name="category" />                
    </div>        
    <div><input class="btn btn-success" type="submit" value="Submit" /></div>
</form>
</div>
<?php
include 'includes/footer.php';
?>