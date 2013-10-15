<?php
$pageTitle = "Books Catalogue";
include 'includes/header.php';
include 'includes/functions.php';

connect($connection);

if (isset($_GET['author'])) {
    $author = trim(urldecode($_GET['author']));
    
    $query = mysqli_query($connection, 'select books.book_id, books.book_title, authors.author_name
	from books inner join books_authors
	on books.book_id = books_authors.book_id
	inner join authors
	on books_authors.author_id = authors.author_id
	where books_authors.book_id in (
		select books_authors.book_id
		from books_authors inner join authors
		on books_authors.author_id = authors.author_id
		where authors.author_name = "' . $author . '")
	 order by book_title asc');
} else {
    $query = mysqli_query($connection, "select b.book_title, b.book_id, a.author_name from  books as b, authors as a
join books_authors as ba
where a.author_id = ba.author_id
and b.book_id = ba.book_id
order by b.book_title asc");
}
$result = array();

while ($row = mysqli_fetch_assoc($query)) {
    $result[$row['book_id']]['book_title'] = $row['book_title'];
    $result[$row['book_id']]['authors'][]  = $row['author_name'];
}
?>
<div class="hero-unit offset1 span10">
  <h1>
    <?= $pageTitle; ?>
  </h1>
 <?php 
 if(empty($result))
  {
	  header("location: index.php");
  }
  else{?>
<form method = "get"><table class="table table-stripped">
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
            echo '<a href="?author=' . urlencode($vv) . '">' . $vv . '</a>';
        } else {
            echo '<a href="?author=' . urlencode($vv) . '">' . $vv . '</a>,  ';
        }
        $count++;
    }
    echo '</td></tr>';
}
?>
</tbody>
</table></form>
<?php } ?>
</div>
<?php
include 'includes/footer.php';
?>