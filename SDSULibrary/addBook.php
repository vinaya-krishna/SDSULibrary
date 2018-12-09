<?php
	require('config/config.php');
	require('config/db.php');

    if (isset($_POST['signup'])) {

        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
        $copies = mysqli_real_escape_string($conn, $_POST['copies']);
        $summary = mysqli_real_escape_string($conn, $_POST['summary']);
        $image = mysqli_real_escape_string($conn, $_POST['image']);

        $insert_query = "insert into bookInventory values ('$title','$fname','$lname','$copies','$isbn', '$image','$summary')";


        if(mysqli_query($conn, $insert_query)){
            header('Location:http://localhost:8080/SDSULibrary/admin.php');
        }
        else{
            echo "ERROR:".mysqli_error($conn);
        }
    }



    mysqli_close($conn);
?>



<?php include('inc/header.php'); ?>
<div class="container mt-5">
    <div id="signup-form">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >
            <div class="col-md-6 mx-auto">
            	<div class="card card-signin my-5">
            		<div class="card-body">
            			<h3 class="card-title text-center">Book Information</h3>
            			<form class="form-login">
				            <div class="form-group">
					            <label for="title">Title</label>
					            <input type="text" name="title" class="form-control" placeholder="Title" required>
				            </div>
                            <div class="form-group">
                                <label for="fname">Author's First Name</label>
                                <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <label for="lname">Author's Last Name</label>
                                <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <label for="isbn">ISBN #</label>
                                <input type="text" name="isbn" class="form-control" placeholder="ISBN #" required>
                            </div>

                            <div class="form-group">
                                <label for="copies">Copies Available</label>
                                <input type="text" name="copies" class="form-control" placeholder="Copies Available" required>
                            </div>


                            <div class="form-group">
                                <label for="copies">Summary</label>
                                <textarea  name="summary" class="form-control" placeholder="Summary" required>
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Add Cover Image</label>
                                <input type="text" name="image" class="form-control" placeholder="Image File" required>
                            </div>


                			<div class="form-group">
                    			<button type="submit" class="btn btn-block btn-primary"
                       name="signup">Save</button>
                			</div>
						</form>
            		</div>
            	</div>
            </div>
        </form>
    </div>
</div>

<?php include('inc/footer.php'); ?>
