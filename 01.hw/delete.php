<?php
$pageTitle = "Delete Expense";
include 'includes/header.php';
?>
<div class="hero-unit offset1 span10">
<h1><?= $pageTitle; ?></h1>

<?php
if (isset($_GET['id'])) {
    $inputId = $_GET['id'];
    if (ctype_digit($inputId)) {
        $row = $inputId;
    } else {
        header("refresh:0;url=error.php");
    }
    
    $data          = 'data.txt';
    $fileConteiner = file($data);
    $rowToDelete   = $fileConteiner[$row];
    
    $fileContent = str_replace($rowToDelete, '', file_get_contents($data));
    file_put_contents($data, $fileContent);
    
    echo '<p class="lead">Product was successfuly deleted.</p>';
    header("refresh:1;url=index.php");
} else {
    echo '<p class="lead">Incorect data.</p>';
    header("refresh:2;url=index.php");
}

?>

</div>
<?php
include 'includes/footer.php';
?>