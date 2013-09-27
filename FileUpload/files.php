<?php
$pageTitle = "Files List";
include 'includes/header.php';
include 'functions.php';

session_start();

if ( !is_logged_in()) {
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
  </tr>
  </thead>
  <tbody>
<?php
      $userFiles = scandir($path);
        for($i = 2; $i < count($userFiles); $i++) {

            $size = formatSizeUnits(filesize($path . DIRECTORY_SEPARATOR . $userFiles[$i]));

            $link = '<a href="download.php?file=' . $userFiles[$i] . '" >';

            echo '<tr><td>'.$link. $userFiles[$i] .'</a></td>
					<td>'.$size.'</td></tr>';
        }
	?>
    </tbody>
    </table>
</div>
<?php
include 'includes/footer.php';
?>