<?php
$pageTitle = "Edit the Expense";
include 'includes/header.php';
?>
<?php
if (isset($_GET['id'])) {
    $inputId = $_GET['id'];
    if (ctype_digit($inputId)) {
        $row = $inputId;
    } else {
        header("refresh:0;url=error.php");
    }
    
    $data          = 'data.txt';
    $fileConteiner = file($data);
    $rowToEdit     = $fileConteiner[$row];
    $exploded      = explode('!', $rowToEdit);
    $oldDate       = $exploded[0];
    $oldProduct    = $exploded[1];
    $oldExpense    = $exploded[2];
    $oldCat        = $categories[trim($exploded[3])];
} else {
    header("refresh:0;url=error.php");
}
?>

<div class="hero-unit offset1 span5">
  <h1>
    <?= $pageTitle; ?>
  </h1>
  <form method="POST" action="edit.php">
    <div>
      <label class="label label-success" for="dateId">Date: </label>
      <input type="date" id="dateId" name="date" value="<?php
echo $oldDate;
?>" required />
    </div>
    <div>
      <label class="label label-success" for="prodId">Product: </label>
      <input type="text" id="prodId" name="product" value="<?php
echo $oldProduct;
?>" required />
    </div>
    <div>
      <label class="label label-success" for="epenseId">Expense: </label>
      <input type="number" id="epenseId" name="expense" value="<?php
echo $oldExpense;
?>" required step="any" min="0.01" />
    </div>
    <div>
      <label class="label label-success" for="catId">Category: </label>
      <select name="category" selected>
        <?php
foreach ($categories as $key => $val) {
    if ($val == $oldCat) {
        echo '<option selected="selected" value="' . $key . '">' . $val . '</option>';
    } else {
        echo '<option value="' . $key . '">' . $val . '</option>';
    }
}
?>
      </select>
    </div>
    <div>
      <input class="btn btn-success" type="submit"   onClick="return confirm(\'Are you sure you want to submit change?\')" value="Submit"/>
    </div>
    <input name="row" type="hidden" value="<?php
echo $row;
?>" />
  </form>
</div>
<?php
include 'includes/footer.php';
?>