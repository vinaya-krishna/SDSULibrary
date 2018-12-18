<?php
	require('config/config.php');
	require('config/db.php');
	session_start();

	  
    $taken = False;

    $isbn = $_GET['id'];
    $redid = $_SESSION['user'];
    $book_taken = "";


    $query_book = "SELECT * FROM bookInventory where ISBN={$isbn}";
    $result_book = mysqli_query($conn, $query_book);
    $book_data = mysqli_fetch_assoc($result_book);


    if(isset($_POST['lend'])){
      $checkin = date("Y-m-d");
      $checkout = date('Y-m-d', strtotime($checkin. ' + 5 days'));
      
      $query_lend = "insert into borrow values ('$isbn','$redid','$checkout','$checkin')";

      $count = $book_data['availability'];
      $count = $count-1;

      $update_query = "UPDATE bookInventory SET
                      availability='$count'
                      WHERE ISBN={$isbn}
                      ";


      if(mysqli_query($conn, $query_lend)){
          if(mysqli_query($conn, $update_query)){
              
              header('Location:'.ROOT_URL.'success.php');
          }
          else{
                echo "ERROR:".mysqli_error($conn);
          }
      }
      else{
            echo "ERROR:".mysqli_error($conn);
      }

    }

	  

 
    $query_check = "SELECT ISBN FROM student,borrow where student.redid = borrow.redid and borrow.redid={$redid}";
    $result_borrow_book = mysqli_query($conn, $query_check);
    $borrow_data = mysqli_fetch_all($result_borrow_book,MYSQLI_ASSOC);

    foreach ($borrow_data as $value){
      if ($value['ISBN'] == $isbn){
        $taken = True;
        $book_taken = "Book is with you !";
      }
    }
    

    








    mysqli_free_result($result_book);
	  mysqli_close($conn);


?>

<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>

<div class="container pt-4">

  <a href="http://localhost:8080/SDSULibrary/" class="btn btn-primary">Back</a>
	<div class="row pt-3">
		<div class="col-sm-5">
			<!-- <img src="http://placehold.it/700x400" alt="book-image" style="max-width: 100%;"> -->
			<?php echo '<img src="bookCovers/'.$book_data['coverImage'].'" style="max-width: 100%;">'?>
		</div>
  		<div class="col-sm-7">

  			<h3><?php echo $book_data['bookTitle']?></h3>
  			<h5>Author : <?php echo $book_data['authorLastName']?></h5>
  			<h5>ISBN : <?php echo $book_data['ISBN']?></h5>
  			<h5>Available Copies : <?php echo $book_data['availability']?></h5>



      <?php if($taken == True) : ?>
        <div class="alert alert-primary" role="alert">
           <?php echo $book_taken; ?>
        </div>
      <?php else : ?>
    		<?php if($book_data['availability'] > 0) : ?>
            <form method="POST">
              <button type="submit" class="btn btn-primary" name="lend">Lend It</button>
            </form>
      			
  			<?php else : ?>
     				<div class="alert alert-danger" role="alert">
   					 No Copies Available!
  				</div>
  			<?php endif; ?>
      <?php endif; ?>

  			
  		</div>
	</div>

  <div>
      <h3 class="pt-3">Summary</h3><br>
      <p>
        <?php echo $book_data['summary']?>
      </p>
  </div>
	
</div>


<?php include('inc/footer.php'); ?> 
