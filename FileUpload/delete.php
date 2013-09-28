<?php
$pageTitle = "Delete File";
include 'includes/header.php';
session_start();
?>
<div class="hero-unit offset1 span10">
<h1><?= $pageTitle; ?></h1>

<?php
if (isset($_GET['path'])) {
    if (file_exists('files' . DIRECTORY_SEPARATOR . $_SESSION['username'] . DIRECTORY_SEPARATOR . $_GET['path'])) {
        unlink('files' . DIRECTORY_SEPARATOR . $_SESSION['username'] . DIRECTORY_SEPARATOR . $_GET['path']);
        header('Location: files.php');
    }
    echo '<p class="hero-unit green offset1 span4">File was successfuly deleted.</p>';
    header("refresh:1;url=index.php");
} else {
    echo '<p class="hero-unit red offset1 span4">No such file.</p>';
    header("refresh:2;url=files.php");
}
?>

</div>
<?php
include 'functions.php';
include 'includes/footer.php';
?>