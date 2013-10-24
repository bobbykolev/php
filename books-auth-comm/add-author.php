<?php
$pageTitle = "Add Author";
include 'includes/header.php';
include 'includes/functions.php';

mb_internal_encoding('UTF-8');
connect($connection);
?>
<div class="hero-unit offset1 span10">
  <h1>
    <?= $pageTitle; ?>
  </h1>
<?php
$selectQuery   = "select * from authors";
$checkunique = mysqli_query($connection, $selectQuery);
$isUnique = true;
if (isset($_POST['add-author'])) {
    $newAuthor = htmlspecialchars(trim($_POST['author-name']));
    if (mb_strlen($newAuthor) < 3 || mb_strlen($newAuthor) > 250) {
        echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>The author\'s name should be between 3 and 250 letters long.</div>';
    } else {
        while ($row1 = $checkunique->fetch_assoc()) {
            if (!($row1['author_name'] == $newAuthor)) {
                continue;
            } else {
                echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>This author already exists.</div>';
                $isUnique = false;
                break;
            }
        }
        if ($isUnique) {
        	$insertQuery = "insert into authors (author_name) values('" . mysqli_real_escape_string($connection, $newAuthor) . "')";
            mysqli_query($connection, $insertQuery);
        	echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>"' . $newAuthor . '" has been added.</div>';
        }
    }
}
?>

<form method = "post">
	 <ul class="add-ul add">
            <li><label class="label label-success" for = "a-name">Add Author</label>
	<input id="a-name" type = "text" name = "author-name"/>
    </li>
    <li>
    <input class="btn btn-success btn-small" type = "submit" name = "add-author" value = "Add Author"/>
    </li>
		</ul>
</form>

<table class="table table-stripped">
<thead>
<tr>
<th>Authors</th>
</tr>
</thead>
<tbody>
<?php
$results = mysqli_query($connection, $selectQuery);
while ($row = $results->fetch_assoc()) {
    echo '<tr><td><a href="index.php?author='. urlencode($row['author_id']) .'">' . $row['author_name'] . '</a></td></tr>';
}
?>
</tbody>
</table>
</div>
<?php
include 'includes/footer.php';
?>