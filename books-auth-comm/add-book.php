<?php
$pageTitle = "Add Book";
include 'includes/header.php';
include 'includes/functions.php';

connect($connection);
?>
<div class="hero-unit offset1 span10">
  <h1>
    <?= $pageTitle; ?>
  </h1>
<?php
if (isset($_POST['add-book'])) {
	$title = htmlspecialchars(trim($_POST['new-book']));
	if (mb_strlen($title) < 3 || mb_strlen($title) > 250) {
		echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>The title length should be between 3 and 250.</div>';
	}else if(!isset($_POST['authors-list']))
	{
		echo '<div class="alert alert-block"><button type="button" class="close" data-dismiss="alert">&times;</button>You should select at least one author.</div>';
	}
	 else 
	 {
		$authors = $_POST['authors-list'];
		
		foreach ($authors as $val) {
			
			$val = trim($val);
			$data = mysqli_query($connection, "select author_name from authors where author_id = ".$val."");
			if(!is_numeric($val))
			{
				echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Wrong query.</div></div>';
				include 'includes/footer.php';
				die;
			}
			else if(mysqli_num_rows($data)<1)
			{
				echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>You are trying to add a book with not existing author.</div></div>';
				include 'includes/footer.php';
				die;
			}
			$authors_list[] = $val;
		}
		
		
		$qInsertBook = "insert into books (book_title) values('" . mysqli_real_escape_string($connection, $title) . "')";
		mysqli_query($connection, $qInsertBook);
		$bookId = mysqli_insert_id($connection);
		
		$qInsertBA = "insert into books_authors (book_id, author_id) values";
		$count     = 1;
		
		foreach ($authors_list as $v) {
			if ($count == count($authors_list)) {
				$qInsertBA .= "(" . $bookId . ", " . $v . ");";
			} else {
				$qInsertBA .= "(" . $bookId . ", " . $v . "),";
			}
			$count++;
		}
		mysqli_query($connection, $qInsertBA);
		
		echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>"' . $title . '" has been added</div>';
    }
}
?>

	<form method = "POST" action = "">
        <ul id="add-book-ul" class="add-ul add">
            <li>
            <label class="label label-success" for = "mul">Add Book Author</label>
            <select id="mul" name = "authors-list[]" multiple >
<?php
$query  = "select * from authors";
$result = query($query, $connection);

foreach ($result as $row) {
	echo '<option value =  ' . $row->author_id . '>' . $row->author_name . '</option>';
}
?>
            </select>
            </li>
            <li>
            <label class="label label-success" for = "new-book">Add Book Title</label>
            <input type = "text" name = "new-book" id="new-book"/>
            </li>
            <li>
            <input class="btn btn-success btn-small" type = "submit" name = "add-book" value = "Add Book"/>
            </li>
        </ul>
	</form>
</div>
<?php
include 'includes/footer.php';
?>