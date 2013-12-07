<?php
$pageTitle = "Add Auction";
include 'includes/header.php';
include 'includes/functions.php';

connect($connection);
?>
<div class="hero-unit offset1 span10">
  <h1>
    <?= $pageTitle; ?>
  </h1>
<?php
if(isset($_SESSION['username'])){
if (isset($_POST['add-auction'])) {
	$title = htmlspecialchars(trim($_POST['title']));
	if (mb_strlen($title) < 3 || mb_strlen($title) > 250) {
		echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>The title length should be between 3 and 250.</div>';
	}else if(!isset($_POST['price']) || !isset($_POST['date']) || !isset($_POST['desc']))
	{
		echo '<div class="alert alert-block"><button type="button" class="close" data-dismiss="alert">&times;</button>All fields are required.</div>';
	}
	//TODO: checks for correct date, price, description...
 	else{
 		//TODO: better escaping and checking of the user input (not only here) no time now :( 
		$price = (int)trim($_POST['price']);
		$dateNow = new DateTime();
		$dateNow = $dateNow->getTimestamp();
		$date = new DateTime(trim($_POST['date']));
		$date = $date->getTimestamp();
		$desc = htmlspecialchars(trim($_POST['desc']));

		$qInsertA = "insert into auctions (user_id,date_created,minimum_price,date_end,action_title,auction_desc) values('".$_SESSION['user_id']."','".$dateNow."','".$price."','".$date."','" . mysqli_real_escape_string($connection, $title) . "','" . mysqli_real_escape_string($connection, $desc) . "')";
		mysqli_query($connection, $qInsertA);
		$ID = mysqli_insert_id($connection);
		
		$qInsertP = "insert into auction_prices (user_id,auction_id,price,date_added) values('".$_SESSION['user_id']."','".$ID."','".$price."','".$date."')";
		
		mysqli_query($connection, $qInsertP);
		
		echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>"' . $title . '" has been added</div>';
    }
}
?>

	<form method = "POST" action = "">
        <ul id="add-book-ul" class="add-ul add">
            <li>
            <label class="label label-success" for = "mul">Add Title</label>
            <input type = "text" name = "title" required/>
            </li>
            <li>
            <label class="label label-success" for = "new-book">Add Price</label>
            <input type = "number" name = "price" required="" step="any" min="0.01"/>
            </li>
            <li>
            <label class="label label-success" for = "new-book">Add End Date</label>
            <input type="date" id="dateId" name="date" required />
            </li>
            <li>
            <label class="label label-success" for = "new-book">Add Description</label>
            <input type = "text" name = "desc" required/>
            </li>
            <li>
            <input class="btn btn-success btn-small" type = "submit" name = "add-auction" value = "Add Book"/>
            </li>
        </ul>
	</form>
</div>
<?php
}else{
	echo "You shouldn't be here :)";
}
include 'includes/footer.php';
?>