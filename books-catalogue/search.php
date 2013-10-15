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
    if ($searching == "yes") {
        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><h4>Results for "' . $find . '"</h4></div>';
    }
    
    connect($connection);
    $data = array();

    if ($find == "") {
        $data = mysqli_query($connection, "select b.book_title, b.book_id, a.author_name from  books as b, authors as a
join books_authors as ba
where a.author_id = ba.author_id
and b.book_id = ba.book_id
order by b.book_title asc");
    } else {
        $find = strtoupper($find);
        $find = htmlspecialchars($find);
        $find = trim($find);
        $data = array();
        $data = mysqli_query($connection, "select b.book_title, b.book_id, a.author_name from  books as b, authors as a
join books_authors as ba
where a.author_id = ba.author_id
and b.book_id = ba.book_id
and upper($field) LIKE'%$find%'");
    }
?>

<table>
<thead>
<tr>
<th>Books</th>
<th>Authors</th>
</tr>
</thead><tbody>

<?php
    $result = array();
    while ($result = mysqli_fetch_assoc($data)) {
        echo '<tr><td>' . $result['book_title'] . '</td>';
        echo '<td><a href="index.php?author=' . urlencode($result['author_name']) . '">' . $result['author_name'] . '</a></td></tr>';
    }
    echo '</tbody></table>';
    $anymatches = mysqli_num_rows($data);
    if ($anymatches == 0) {
        echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>No results.</div><br>';
    }
}
?>
</tbody>
</table>
</div>
<?php
include 'includes/footer.php';
?>