<?php
$pageTitle = "Books Catalogue";
include 'includes/header.php';
include 'includes/functions.php';

connect($connection);

if (isset($_GET['author'])) {
    $author = trim(urldecode($_GET['author']));
    
    $query = mysqli_query($connection, 'select b.book_id, a.author_id, b.book_title, a.author_name
           from authors as a
           left join books_authors ba 
           on ba.author_id = a.author_id
           left join books b 
           on b.book_id = ba.book_id
           left join books_authors bba 
           on bba.book_id = b.book_id
          where 1 and bba.author_id = "' . $author . '"
	 order by book_title asc');
} else {
    $query = mysqli_query($connection, "select * FROM books as b INNER JOIN 
           books_authors as ba ON b.book_id=ba.book_id 
           INNER JOIN authors as a
           ON a.author_id=ba.author_id
		   order by b.book_title asc");
}
$result = array();

while ($row = mysqli_fetch_assoc($query)) {
    $result[$row['book_id']]['book_title'] = $row['book_title'];
    $result[$row['book_id']]['authors'][$row['author_id']]  = $row['author_name'];
}
?>
<div class="hero-unit offset1 span10">
  <h1>
    <?= $pageTitle; ?>
  </h1>
 <?php 
 if(empty($result))
  {
	 echo '<div class="alert alert-block"><button type="button" class="close" data-dismiss="alert">&times;</button><p>No results.</p><div class="redi"><p>redirecting...</p><p class="center"><img src="styles/img/redir.gif" alt="" /></p></div></div>';
		header("refresh:5;url=index.php");
		include 'includes/footer.php';
		exit;
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
foreach ($result as $k => $v) {
    echo '<tr><td><a href="book.php?book='. $k .'">' . $v['book_title'] . '</a></td><td>';
    $count = 1;
    foreach ($v['authors'] as $kk => $vv) {
        if ($count == count($v['authors'])) {
            echo '<a href="?author=' . $kk . '">' . $vv . '</a>';
        } else {
            echo '<a href="?author=' . $kk . '">' . $vv . '</a>,  ';
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