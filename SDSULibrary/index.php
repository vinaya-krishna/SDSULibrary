<?php
	require('config/config.php');
	require('config/db.php');
	session_start();


	if (!isset($_SESSION['user'])) {
    	header("Location: login.php");
    	exit;
	}

	// select logged in users detail
	$res = mysqli_query($conn, "SELECT * FROM student WHERE redid=" . $_SESSION['user']);
	$userData = mysqli_fetch_assoc($res);

	// var_dump($userData);

	$_SESSION['name'] = $userData['first_name'];


	// // Create Query
	$query = 'SELECT * FROM student';
	$result = mysqli_query($conn, $query);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);



    $query_books = 'SELECT * FROM bookInventory';
    $result_books = mysqli_query($conn, $query_books);
    $inventory = mysqli_fetch_all($result_books, MYSQLI_ASSOC);

    
    mysqli_free_result($result_books);
	mysqli_free_result($result);
	mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>

<div class="container pt-4">
	<div class="row">
		<!-- <div class="col-lg-4 col-md-6 mb-4"> -->
		<?php foreach($inventory as $stock) : ?>
		<div class="col-md-4">
			<div class="card">
				<?php echo '<img height="400" class="card-img-top" src="bookCovers/'.$stock['coverImage'].'">'?>
				<div class="card-body">
					<h4 class="card-title">
						<?php echo $stock['bookTitle']?>
					</h4>	
					<a href="details.php?id=<?php echo $stock['ISBN']?>" class="btn btn-primary">Details</a>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
		<!-- </div> -->
	</div>
</div>


<?php include('inc/footer.php'); ?>
