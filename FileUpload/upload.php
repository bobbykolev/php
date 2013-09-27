<?php
$pageTitle = "Upload";
include 'includes/header.php';

if(isset($_POST['fileUpload']))
{
 if($_FILES) {
	 if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
        if(move_uploaded_file($_FILES['upload']['tmp_name'], $path. DIRECTORY_SEPARATOR . $_FILES['upload']['name'])) {
            echo '<p class="hero-unit green offset1 span4">Successfully uploaded!</p>';
			header("refresh:2;url=files.php");
        }
        else {
            echo '<p class="hero-unit red offset1 span4">An error occured. Try again.</p>';
			header("refresh:2;url=file-upload.php");
        }
    }
}
else{
	echo '<p class="hero-unit red offset1 span4">Unsuccessfully uploaded!</p>';
	header("refresh:2;url=file-upload.php");
}
include 'includes/footer.php';