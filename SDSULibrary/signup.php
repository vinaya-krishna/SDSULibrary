<?php
	require('config/config.php');
	require('config/db.php');

    if (isset($_POST['signup'])) {
        
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $sname = mysqli_real_escape_string($conn, $_POST['sname']);
        $redid = mysqli_real_escape_string($conn, $_POST['redid']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $u_password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = hash('sha256', $u_password);

        $insert_query = "insert into student values ('$redid','$fname','$sname','$email','$phone','$password')";
        $user_exists_query = 'select redid from student where redid='.$redid;

        $q =mysqli_query($conn, $user_exists_query);
        $res = mysqli_fetch_assoc($q);

        if(count($res)>0){
            echo "User exists";
        }
        else{

            if(mysqli_query($conn, $insert_query)){
                header('Location:'.ROOT_URL.'');
            }
            else{
                echo "ERROR:".mysqli_error($conn);
            }
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
            			<h3 class="card-title text-center">Sign Up</h3>
            			<form class="form-login">
				            <div class="form-group">
					            <label for="fname">First Name</label>
					            <input type="text" name="fname" class="form-control" placeholder="First Name" required>
				            </div>
                            <div class="form-group">
                                <label for="sname">Second Name</label>
                                <input type="text" name="sname" class="form-control" placeholder="Second Name" required>
                            </div>
                            <div class="form-group">
                                <label for="redid">Red ID</label>
                                <input type="number" name="redid" class="form-control" placeholder="Red ID" required>
                            </div>
                            <div class="form-group">
                                <label for="redid">email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="phone" name="phone" class="form-control" placeholder="Phone" required>
                            </div>

				            <div class="form-group">
					            <label for="password">Password</label>
					            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
				            </div>
				             
                			<div class="form-group">
                    			<button type="submit" class="btn btn-block btn-primary"
                       name="signup">Sign Up</button>
                			</div>

                            <div class="form-group">
                                <p>Already have an account?</p>
                                <a href="login.php" class="btn btn-block btn-success" name="btn-login">Login</a>
                            </div>
						</form>
            		</div>
            	</div>
            </div>
        </form>
    </div>
</div>
