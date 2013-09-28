<?php
include 'includes/header.php';

$file = basename($_GET['file']);
$file = $path.DIRECTORY_SEPARATOR.$file;

if(!$file){
	echo '<p class="hero-unit green offset1 span4">File not found</p>';
    die();
} else {
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

    // read the file from disk
    readfile($file);
}
include 'functions.php';
include 'includes/footer.php';