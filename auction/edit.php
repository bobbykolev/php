<?php
$pageTitle = "Edit Auction Price";
include 'includes/header.php';
include 'includes/functions.php';

connect($connection);

if (isset($_GET['id'])) {
    $id = (int) trim($_GET['id']);
    
    $query = mysqli_query($connection, 'select *
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
where 
p.auction_id =' . $id . '');

$row = mysqli_fetch_assoc($query);

}
?>
<div class="hero-unit offset1 span10">
  <h1>
    <?= $pageTitle; ?>
  </h1>
 <?php 
 if(empty($row))
  {
	  echo '<div class="alert alert-block"><button type="button" class="close" data-dismiss="alert">&times;</button><p>No such auction.</p><div class="redi"><p>redirecting...</p><p class="center"><img src="styles/img/redir.gif" alt="" /></p></div></div>';
		header("refresh:5;url=index.php");
		include 'includes/footer.php';
		exit;
  }
  else{?>
<table class="table table-stripped">
<thead>
<tr>
<th>Title</th>
<th>Date Created</th>
<th>Price End</th>
<th>User</th>
<th>Initial price</th>
<th>Latest Price</th>
<th>Description</th>
</tr>
</thead><tbody>
<?php
$timeNow = new DateTime();

    echo '<tr><td>' . $row['action_title'] . '</td>'.
    '<td>'. date('d/m/Y - H:i:s', $row['date_created']). '</td><td>'. date('d/m/Y - H:i:s', $row['date_end']). '</td><td>'. $row['email'] . '</td>'.
    '<td>'. $row['minimum_price'] . '</td><td>'. $row['price'] . '</td><td>'. $row['auction_desc'] . '</td></tr>';


?>
</tbody>
</table>
<hr><br>
<?php 
if (is_logged_in()) {
  //TODO: checks!!!
	if (isset($_POST['submitPrice']))
	{
    $date = new DateTime();
    $date = $date->getTimestamp();
		$newPrice = (int)trim($_POST['new-price']);
      if($newPrice > $row['price']){
  		$query = mysqli_query($connection, 'update auction_prices set price='.$newPrice.',date_added='.$date.' WHERE price_id = '.$row['price_id'].'');
  		echo '<script type="text/javascript">window.location.reload();</script>';
    }else{
      echo '<div class="alert alert-block"><button type="button" class="close" data-dismiss="alert">&times;</button><p>The price should be bigger than the previous one.</p></div>';
    }
	}
	?>
  <form method="post">
	<div>
			<label class="label label-success" for="txt">Raise The Price: </label><br />
			<input  type= "number" id="txt" name="new-price" required/>
			<input class="btn btn-success" type="submit" value="Submit" name="submitPrice">	
	</div>
</form>
<?php    }
}//end of else - not empty result ?>
</div>
<?php
include 'includes/footer.php';
?>