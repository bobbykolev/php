<?php
$pageTitle = "Books Catalogue";
include 'includes/header.php';
include 'includes/functions.php';

connect($connection);

if (isset($_GET['book'])) {
    $book = (int) trim($_GET['book']);
    
    $query = mysqli_query($connection, 'select b.book_id, a.author_id, b.book_title, a.author_name, c.comm_text, c.comm_id, c.comm_date, u.username, u.user_id
           from authors as a
           left join books_authors ba 
           on ba.author_id = a.author_id
           left join books b 
           on b.book_id = ba.book_id
           left join books_authors bba 
           on bba.book_id = b.book_id
           left join comments c 
           on b.book_id = c.book_id
           left join users u 
           on u.user_id = c.user_id
          	where 1 and bba.book_id = ' . $book . '
			order by comm_date desc');

$result = array();

while ($row = mysqli_fetch_assoc($query)) {
    $result[$row['book_id']]['book_title'] = $row['book_title'];
    $result[$row['book_id']]['authors'][$row['author_id']]  = $row['author_name'];
	$result[$row['book_id']]['comments'][$row['comm_text']]  = $row['username'];
}
}
?>
<div class="hero-unit offset1 span10">
  <h1>
    <?= $pageTitle; ?>
  </h1>
 <?php 
 if(empty($result))
  {
	  echo '<div class="alert alert-block"><button type="button" class="close" data-dismiss="alert">&times;</button><p>No such book.</p><div class="redi"><p>redirecting...</p><p class="center"><img src="styles/img/redir.gif" alt="" /></p></div></div>';
		header("refresh:5;url=index.php");
		include 'includes/footer.php';
		exit;
  }
  else{?>
<form method = "get"><table class="table table-stripped">
<thead>
<tr>
<th>Book</th>
<th>Authors</th>
</tr>
</thead><tbody>

<?php
echo '<tr><td>' . $result[$book]['book_title'] . '</td><td>';
foreach ($result as $v) {
    $count = 1;
    foreach ($v['authors'] as $kk=>$vv) {
        if ($count == count($v['authors'])) {
            echo '<a href="index.php?author=' . $kk . '">' . $vv . '</a>';
        } else {
            echo '<a href="index.php?author=' . $kk . '">' . $vv . '</a>,  ';
        }
        $count++;
    }
    echo '</td></tr></tbody></table><hr><br>';
	echo '<table class="table table-stripped"><thead><tr><th>Comments</th><th>User</th></tr></thead><tbody>';
	foreach ($v['comments'] as $kk => $vv) {
            echo '<tr><td><p>' . $kk . '</p></td><td><p>' .$vv. '</p></td></tr>';
    }
}
?>
</tbody></table>
</form><hr><br>
<?php 
if (is_logged_in()) {
	if (isset($_POST['submitComment']))
	{
		$uname = trim($_SESSION['username']);
		$query = mysqli_query($connection, 'select user_id from users where users.username = \''.$uname.'\'');
		$r = mysqli_fetch_assoc($query);
		$userId = (int) $r['user_id'];
		$comm = htmlspecialchars(trim($_POST['txt']));
		$date = date("Y-m-d H:i:s");
		$qAddComment = "insert into comments (comm_text, comm_date, book_id, user_id) values('" . mysqli_real_escape_string($connection, $comm) . "', '".$date. "', '".$book."', '".$userId."')";
		mysqli_query($connection, $qAddComment);
		echo '<script type="text/javascript">window.location.reload();</script>';
	}
	?>
        <form method="post">
	<div>
			<label class="label label-success" for="txt">Comment: </label><br />
			<textarea id="txt" name="txt" required></textarea>
			<input class="btn btn-success" type="submit" value="Submit" name="submitComment">	
	</div>
</form>
<?php    }
}//end of else - not empty result ?>
</div>
<?php
include 'includes/footer.php';
?>