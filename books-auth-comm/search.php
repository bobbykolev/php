<?php
$pageTitle = "Search";
include 'includes/header.php';
include 'includes/functions.php';
?>
<div class="hero-unit offset1 span10">
  <h1>
    <?= $pageTitle; ?>
  </h1>
<?php
if (isset($_POST['search'])) {
    $searching = $_POST['searching'];
    $find      = $_POST['find'];
    $field     = $_POST['field'];

    connect($connection);
	//trim, html escape , sql escape and transform to uppercase
	$find = strtoupper(mysqli_real_escape_string($connection, htmlspecialchars(trim($find))));
	
	if ($searching == "yes") {
		$emptySearch = 'All books';
        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><h4>Results for "' . (!empty($find) ? $find : $emptySearch) . '"</h4></div>';
    }
	
    if ($find == "") {
        $query =  "select b.book_title, b.book_id, a.author_name from  books as b, authors as a
	join books_authors as ba
	where a.author_id = ba.author_id
	and b.book_id = ba.book_id
	order by b.book_title asc";
    }
	else if ($field == 'author_name') {
        $query = "select books.book_id, books.book_title, authors.author_name
        from books inner join books_authors
        on books.book_id = books_authors.book_id
        inner join authors
        on books_authors.author_id = authors.author_id
        where books_authors.book_id in (
           select books_authors.book_id
           from books_authors inner join authors
           on books_authors.author_id = authors.author_id
           and upper(author_name) LIKE'%$find%')";
	} 
	else {
	
	$query = "select b.book_title, b.book_id, a.author_name from  books as b, authors as a
	join books_authors as ba
	where a.author_id = ba.author_id
	and b.book_id = ba.book_id
	and upper(book_title) LIKE'%$find%'";
	}
	
	$data = array();
	$data = mysqli_query($connection, $query);
	$result = array();
 	while ($row = mysqli_fetch_assoc($data)) {
        $result[$row['book_id']]['book_title'] = $row['book_title'];
        $result[$row['book_id']]['authors'][] = $row['author_name'];
}

?>

<table class="table table-stripped">
<thead>
<tr>
<th>Books</th>
<th>Authors</th>
</tr>
</thead><tbody>

<?php
    foreach ($result as $v) {
    echo '<tr><td>' . $v['book_title'] . '</td><td>';
    $count = 1;
    foreach ($v['authors'] as $vv) {
        if ($count == count($v['authors'])) {
            echo '<a href="index.php?author=' . urlencode($vv) . '">' . $vv . '</a>';
        } else {
            echo '<a href="index.php?author=' . urlencode($vv) . '">' . $vv . '</a>,  ';
        }
        $count++;
    }
    echo '</td></tr>';
}
?>
</tbody>
</table>
<?php } //end of if (isset($_POST['search']))?>
</div>
<?php
include 'includes/footer.php';
?>