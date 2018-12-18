<?php
	require('config/config.php');
	require('config/db.php');
    session_start();

    if(isset($_FILES['image'])){
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

            $image = $file_name;

            echo $image;

            $expensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$expensions)=== false){
             $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if($file_size > 2097152){
                $errors[]='File size must be excately 2 MB';
            }

            if(empty($errors)==true){
                move_uploaded_file($file_tmp,"bookCovers/".$file_name);
            }else{
                print_r($errors);
            }

    }




    if (isset($_POST['signup'])) {

        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
        $copies = mysqli_real_escape_string($conn, $_POST['copies']);
        $summary = mysqli_real_escape_string($conn, $_POST['summary']);
        $admin_email =  mysqli_real_escape_string($conn, $_SESSION['admin']);
        
        

        $insert_query = "insert into bookInventory values ('$title','$fname','$lname','$copies','$isbn', '$image','$summary','$admin_email')";


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
<?php include('inc/navbar_admin.php'); ?>
<div class="container mt-5">
    <div id="signup-form">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="col-md-9 mx-auto">
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
                                <input type="number" name="isbn" class="form-control" placeholder="ISBN #" required>
                            </div>

                            <div class="form-group">
                                <label for="copies">Copies Available</label>
                                <input type="number" name="copies" class="form-control" placeholder="Copies Available" required>
                            </div>


                            <div class="form-group">
                                <label for="copies">Summary</label>
                                <textarea name="summary" class="form-control" placeholder="Summary" required>
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Add Cover Image</label>
                                <input type="file" name="image" class="form-control" accept="image/png, image/jpeg,image/jpg" >
                            </div>


                			<div class="form-group">
                    			<!-- <button type="submit" class="btn btn-block btn-primary"
                       name="signup">Save</button> -->

                                <input type="submit" class="btn btn-block btn-primary" name="signup"/>
                			</div>
						</form>
            		</div>
            	</div>
            </div>
        </form>
    </div>
</div>

<?php include('inc/footer.php'); ?>
