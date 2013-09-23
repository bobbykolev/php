<?php
$pageTitle = "Delete Expense";
include 'includes/header.php';
?>
<?php 
if(isset($_GET['id']))
{
	$row = $_GET['id'];
	$data = 'data.txt';
	$fileConteiner = file($data);
	$rowToEdit = $fileConteiner[$row];
	$exploded = explode('!', $rowToEdit);  
	$oldDate =  $exploded[0];
	$oldProduct =  $exploded[1];
	$oldExpense =  $exploded[2];
	$oldCat =  $exploded[3];
}
else
{
	echo '<p class="lead">Incorect data.</p>';
    header("refresh:2;url=index.php");
}
?>
<div class="hero-unit offset1 span5">
<h1><?= $pageTitle; ?></h1>
<form method="POST" action="edit.php">
    <div><label class="label label-success" for="dateId">Date: </label>
    <input type="date" id="dateId" name="date" value="<?php echo $oldDate; ?>" required /></div>
    <div><label class="label label-success" for="prodId">Product: </label>
    <input type="text" id="prodId" name="product" value="<?php echo $oldProduct; ?>" required /></div>
    <div><label class="label label-success" for="epenseId">Expense: </label>
    <input type="number" id="epenseId" name="expense" value="<?php echo $oldExpense; ?>" required step="any" min="0.01" /></div>
    <div><label class="label label-success" for="catId">Category: </label>
    <input type="text" id="catId" name="category" value="<?php echo $oldCat; ?>" required="required" /></div>        
    <div><input class="btn btn-success" type="submit"   onClick="return confirm(\'Are you sure you want to submit change?\')" value="Submit"/></div>
    <input name="row" type="hidden" value="<?php echo $row; ?>" />
</form>
</div>
<?php
	include 'includes/footer.php';      
?>