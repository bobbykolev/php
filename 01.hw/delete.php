<?php
$pageTitle = "Delete Expense";
include 'includes/header.php';
?>
<div class="hero-unit">
<h1><?= $pageTitle; ?></h1>

<?php 
if(isset($_GET['id']))
{
	$row = $_GET['id'];
	$data = 'data.txt';
	$fileConteiner = file($data);
	$rowToDelete = $fileConteiner[$row];

    $fileContent = str_replace($rowToDelete, '', file_get_contents($data));
    file_put_contents($data, $fileContent);
	
	echo '<p class="lead">Product was successfuly deleted.</p>';
    header("refresh:2;url=index.php");
}
else
{
	echo '<p class="lead">Incorect data.</p>';
    header("refresh:2;url=index.php");
}

?>

</div>
<?php
	include 'includes/footer.php';      
?>