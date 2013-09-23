<?php 
$pageTitle = "Expenses List";
include 'includes/header.php';
?>
<div class="hero-unit offset1 span10">
<h1><?= $pageTitle; ?></h1>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Date</th>
            <th>Product</th>
            <th>Expense</th>
            <th>Category</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
		  $sum = 0;
		  $id = 0;
    if(file_exists('data.txt')){
        $data=  file('data.txt');
        foreach ($data as $val) {
            $columns =  explode('!', $val);            
            echo '<tr>
                <td>'.$columns[0].'</td>
                <td>'.$columns[1].'</td>
                <td>'.$columns[2].'</td>
				<td>'.$columns[3].'</td>
				<td><a href="edit-expense.php?id='.$id.'" data-toggle="tooltip" title="Edit"><i class="icon-edit"></i></a></td>
				<td><a href="delete.php?id='.$id.'" data-toggle="tooltip" title="Delete" onClick="return confirm(\'Are you sure you want to delete '.$columns[1].'?\')"><i class="icon-remove"></i></a></td>
                </tr>';
				$sum += floatval($columns[2]);
				$id++;
        }
    }   
	 echo '<tr class="success">
                <td></td>
                <td></td>
                <td data-toggle="tooltip" title="Sum">'.$sum.'</td>
				<td></td>
				<td></td>
				<td></td>
                </tr>'; 
    ?>
      </tbody>  
      </table></div>
      <?php 
include 'includes/footer.php';
?>