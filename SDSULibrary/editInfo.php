<?php
	require('config/config.php');
	require('config/db.php');
  session_start();
    if (isset($_POST['delete'])) {

        $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

        $query = "delete from bookInventory where ISBN={$delete_id}";


        if(mysqli_query($conn, $query)){
          header('Location:http://localhost:8080/SDSULibrary/admin.php');
        }
        else{
            echo "ERROR:".mysqli_error($conn);
        }
    }

    if (isset($_POST['save'])) {

        $update_isbn = mysqli_real_escape_string($conn, $_POST['update_isbn']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
        $copies = mysqli_real_escape_string($conn, $_POST['copies']);
        // $image = mysqli_real_escape_string($conn, $_POST['image']);
        $summary = mysqli_real_escape_string($conn, $_POST['summary']);
        $admin_email =  mysqli_real_escape_string($conn, $_SESSION['admin']);


        $update_query = "UPDATE bookInventory SET
                      bookTitle='$title',
                      authorFirstName='$fname',
                      authorLastName='$lname',
                      availability='$copies',
                      ISBN='$isbn',
                      -- coverImage='$image',
                      summary = '$summary',
                      admin_email= '$admin_email'
                      WHERE ISBN={$update_isbn}
                      ";


        if(mysqli_query($conn, $update_query)){
            header('Location:http://localhost:8080/SDSULibrary/admin.php');
            //header('Location:'.ROOT_URL.'');
        }
        else{
            echo "ERROR:".mysqli_error($conn);
        }
    }

    // get ID
  	$isbn = mysqli_real_escape_string($conn, $_GET['ISBN']);

  	// Create Query
  	$query = 'SELECT * FROM bookInventory WHERE ISBN = '.$isbn;

  	// Get Result
  	$result = mysqli_query($conn, $query);

  	// Fetch Data
  	$post = mysqli_fetch_assoc($result);
  	// var_dump($post);

  	// Free Result
  	mysqli_free_result($result);

  	// Close Connection
  	mysqli_close($conn);
?>



<?php include('inc/header.php'); ?>
<?php include('inc/navbar_admin.php'); ?>
<div class="container mt-5">
    <div id="signup-form">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >
            <div class="col-md-9 mx-auto">
            	<div class="card card-signin my-5">
            		<div class="card-body">
            			<h3 class="card-title text-center">Book Information</h3>

            			<form class="form-login">
				            <div class="form-group">
                      <label for="title">Title</label>
					            <input type="text" name="title" class="form-control" value="<?php echo $post['bookTitle']; ?>">
				            </div>

                            <div class="form-group">
                                <label for="fname">Author's First Name</label>
                                <input type="text" name="fname" class="form-control" value="<?php echo $post['authorFirstName']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="lname">Author's Last Name</label>
                                <input type="text" name="lname" class="form-control" value="<?php echo $post['authorLastName']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="isbn">ISBN #</label>
                                <input type="text" name="isbn" class="form-control" value="<?php echo $post['ISBN']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="copies">Copies Available</label>
                                <input type="number" name="copies" class="form-control" value="<?php echo $post['availability']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="copies">Summary</label>
                                <textarea name="summary" class="form-control" placeholder="Summary" value="<?php echo $post['summary']; ?>"><?php echo $post['summary']; ?>
                                </textarea>
                            </div>


<!--                             <div class="form-group">
                                <label for="image">Add Cover Image</label>
                                <input type="text" name="image" class="form-control" value="<?php echo $post['coverImage']; ?>">
                            </div> -->


                            <input type="hidden" name="update_isbn" value="<?php echo $post['ISBN']; ?>">

                    			<div class="form-group">
                        			<button type="submit" class="btn btn-block btn-primary"
                           name="save">Save</button>
                    			</div>

                      <input type="hidden" name="delete_id" value="<?php echo $post['ISBN']; ?>">
                      <input type="submit" name="delete" value="Delete Entry" class="btn btn-block btn-danger">

						</form>
            		</div>
            	</div>
            </div>
        </form>
    </div>
</div>
<?php include('inc/footer.php'); ?>
