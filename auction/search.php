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

    connect($connection);
  //trim, html escape , sql escape and transform to uppercase
  $find = strtoupper(mysqli_real_escape_string($connection, htmlspecialchars(trim($find))));
  
  if ($searching == "yes") {
    $emptySearch = 'All books';
        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><h4>Results for "' . (!empty($find) ? $find : $emptySearch) . '"</h4></div>';
    }
  
    if ($find == "") {
        $query =  "select *
          FROM 
            auctions as a 
          left JOIN 
               auction_prices as p
          INNER JOIN 
            users as u
          ON 
            u.user_id = p.user_id
          ON 
          p.auction_id=a.auction_id";
    }  else {
  
  $query = "select *
          FROM 
            auctions as a 
          left JOIN 
               auction_prices as p
          INNER JOIN 
            users as u
          ON 
            u.user_id = p.user_id
          ON 
          p.auction_id=a.auction_id
          where a.action_title LIKE'%$find%'";
  }

$query = mysqli_query($connection, $query);

$result = array();

while ($row = mysqli_fetch_assoc($query)) {
    $result[$row['auction_id']][] = $row['action_title'];
    $result[$row['auction_id']][] = $row['date_end'];
    $result[$row['auction_id']][] = $row['price'];
    $result[$row['auction_id']][] = $row['auction_desc'];
    $result[$row['auction_id']][] = $row['email'];
} 
 if(empty($result))
  {
     echo '<div class="alert alert-block"><button type="button" class="close" data-dismiss="alert">&times;</button><p>No results.</p><div class="redi"><p>redirecting...</p><p class="center"><img src="styles/img/redir.gif" alt="" /></p></div></div>';
        header("refresh:5;url=index.php");
        include 'includes/footer.php';
        exit;
  }
  else{ ?>
<table class="table table-stripped">
<thead>
<tr>
<th>Title</th>
<th>Date</th>
<th>Price</th>
<th>Description</th>
<th>User</th>
</tr>
</thead><tbody>
<?php
$timeNow = new DateTime();
foreach ($result as $k => $v) {
  if($v[1] > $timeNow->getTimestamp()){
    echo '<tr><td><a href="edit.php?id='. $k .'">' . $v[0] . '</a></td>'.
    '<td>'. date('d/m/Y - H:i:s', $v[1]). '</td><td>'. $v[2] . '</td>'.
    '<td>'. $v[3] . '</td><td>'. $v[4] . '</td></tr>';
  }
}
?>
</tbody>
</table> 
<?php }} //end of if (isset($_POST['search']))?>
</div>
<?php
include 'includes/footer.php';