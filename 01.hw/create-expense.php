<?php 
$pageTitle = "Create New Expense";
include 'includes/header.php';
?>
<div class="hero-unit offset1 span5">
<h1><?= $pageTitle; ?></h1>
<form method="POST" action="create.php">
    <div><label class="label label-success" for="dateId">Date: </label>
    <input type="date" id="dateId" name="date" required /></div>
    <div><label class="label label-success" for="prodId">Product: </label>
    <input type="text" id="prodId" name="product" required /></div>
    <div><label class="label label-success" for="epenseId">Expense: </label>
    <input type="number" id="expenseId" name="expense" required step="any" min="0.01" /></div>
    <div><label class="label label-success" for="catId">Category: </label>
    <!--<input type="text" id="catId" name="category" /></div> --> 
        <select name="category">
            <?php
            foreach ($categories as $key=>$val) {
                echo '<option value="'.$key.'">' . $val .
                        '</option>';
            }
            ?>
        </select>           
    </div>        
    <div><input class="btn btn-success" type="submit" value="Submit" /></div>
</form>
</div>
<?php 
include 'includes/footer.php';
?>