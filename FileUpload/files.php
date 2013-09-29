<?php
$pageTitle = "Files List";
include 'includes/header.php';
include 'functions.php';

session_start();

if (!is_logged_in()) {
    header('location: login-form.php');
    die();
}
?>
<div class="hero-unit offset1 span10">
  <h1>
    <?= $pageTitle; ?>
  </h1>
  <table class="table table-striped">
  <thead>
  <tr>
  <th>File name</th>
  <th>Size</th>
  <th></th>
  </tr>
  </thead>
  <tbody>
<?php
$path = 'files' . DIRECTORY_SEPARATOR . $_SESSION['username'];

if (file_exists($path)) {
    $files = scandir($path);
    for ($i = 2; $i < count($files); $i++) {
        
        $size = formatSizeUnits(filesize($path . DIRECTORY_SEPARATOR . $files[$i]));
        
        $link = '<a href="download.php?file=' . $files[$i] . '" >';
        echo '<tr><td>' . $link . $files[$i] . '</a></td>
					<td>' . $size . '</td>
					<td><a href="delete.php?path=' . urlencode($files[$i]) . '" data-toggle="tooltip" title="Delete" onClick="return confirm(\'Are you sure you want to delete ' . $files[$i] . '?\')"><i class="icon-remove"></i></a></td></tr>';
    }
}
?>
    </tbody>
    </table>
</div>
<?php
include 'includes/footer.php';
?>