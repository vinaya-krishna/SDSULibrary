<?php
	require('config/config.php');
	require('config/db.php');
	session_start();

	unset($_SESSION['user']);
	unset($_SESSION['name']);

	if (isset($_POST['login'])) {

		$redid = mysqli_real_escape_string($conn, $_POST['redid']);
        $u_password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = hash('sha256', $u_password);


		$user_exists_query = "select * from student where redid='$redid'";

		$q =mysqli_query($conn, $user_exists_query);
		$res = mysqli_fetch_assoc($q);

		
		if($res['password'] == $password){

			$_SESSION['user'] = $redid;

			header('Location:'.ROOT_URL.'');
		}
		else{
			echo "Login Filed";
		}
	}

?>



<?php include('inc/header.php'); ?>
<div class="container mt-5">
    <div id="login-form">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="col-md-6 mx-auto">
            	<div class="card card-signin my-5">
            		<div class="card-body">
            			<h3 class="card-title text-center">SDSU Library</h3>
            			<form class="form-login">
				            <div class="form-group">
					            <label for="redid">Red ID</label>
					            <input type="number" name="redid" class="form-control" placeholder="Red ID" required>
				            </div>

				            <div class="form-group">
					            <label for="password">Password</label>
					            <input type="password" name="password" class="form-control" placeholder="Password" required>
				            </div>
				             <div class="form-group">
                    			<button type="submit" class="btn btn-block btn-primary" name="login">Login</button>
                			</div>
                			<div class="form-group">
                				<p>Don't have account?</p>
                    			<a href="signup.php" class="btn btn-block btn-danger"
                       name="btn-register">SignUp</a>
                			</div>

                			<div class="form-group">
                				<p>Login As Admin ?</p>
                    			<a href="admin_login.php" class="btn btn-block btn-secondary"
                       name="btn-register">Admin</a>
                			</div>
						</form>
            		</div>
            	</div>
            </div>
        </form>
    </div>
</div>

