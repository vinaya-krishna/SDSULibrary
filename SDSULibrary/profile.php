<?php

	require('config/config.php');
	require('config/db.php');
	session_start();

	$ID = $_SESSION['user'];
	$name = $_SESSION['name'];

	if (isset($_POST['return_btn'])) {

		$key = $_POST['key'];
		echo $key;

		// $check = mysqli_query($conn,"select * from borrow where borrow.ISBN={$key} and borrow.redid={$ID}");

		$check = mysqli_query($conn,"delete from borrow where borrow.ISBN={$key} and borrow.redid={$ID}");

		$query_book = "SELECT * FROM bookInventory where ISBN={$key}";
		$result_book = mysqli_query($conn, $query_book);
		$book_data = mysqli_fetch_assoc($result_book);

		$count = $book_data['availability'];
		$count = $count+1;

		$update_query = "UPDATE bookInventory SET
		              availability='$count'
		              WHERE ISBN={$key}
		              ";

		if(mysqli_query($conn, $update_query)){
        	header('Location:'.ROOT_URL.'success_return.php');
        }
        else{
           echo "ERROR:".mysqli_error($conn);
        }

	}



	
	$queryCheck = "select * from bookInventory, borrow, student
	where borrow.redid={$ID} and student.redid={$ID} and bookInventory.ISBN = borrow.ISBN
	";


	
	// $querystudent = 'Select first_name, second_name from student where redid ='.$ID;
	
	$response = mysqli_query($conn, $queryCheck);
	$res_book = mysqli_fetch_all($response,MYSQLI_ASSOC);


	// $res_student = mysqli_query($conn, $querystudent);

	// var_dump($res_book);




?>

<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<div class="container mt-5">

	<h3>Books lended : </h3>

	<table class="table table-hover">
		<thead>
		<tr>
		  <th scope="col"></th>
		  <th scope="col">Title</th>
		  <th scope="col">Return By</th>
		  <th scope="col">Check out</th>
		  <th scope="col"></th>
		</tr>
		</thead>
  		<tbody>

		<?php
			foreach ($res_book as $res){
		      	echo "
<tr>
<td><img src=bookCovers/{$res['coverImage']} height=100></td>
<td>{$res['bookTitle']}</td>
<td>{$res['check-in']}</td>
<td>{$res['check-out']}</td>
<td>
	<form action='' method='POST'> 
		<input type='checkbox' name='key' value={$res['ISBN']} checked style='display: none;'/>
		<input type='submit' value='Return' name='return_btn' class='btn btn-warning'/>
	</form>
</td>
</tr>
";
		    } 
	    ?>
	     </tbody>
	</table>


</div>




