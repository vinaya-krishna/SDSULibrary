<?php
	require('config/config.php');
	require('config/db.php');
	session_start();

	unset($_SESSION['admin']);
	unset($_SESSION['name']);
	
	if (isset($_POST['login'])) {

		$email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        

		$user_exists_query = "select * from admin where email='$email'";

		$q =mysqli_query($conn, $user_exists_query);
		$res = mysqli_fetch_assoc($q);

		
		if($res['password'] == $password){

			$_SESSION['admin'] = $email;
			$_SESSION['name'] = $res['first_name'];

			header('Location:'.ROOT_URL.'/admin.php');
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
            			<h3 class="card-title text-center">SDSU Library Admin</h3>
            			<form class="form-login">
				            <div class="form-group">
					            <label for="redid">Email</label>
					            <input type="email" name="email" class="form-control" placeholder="Email" required>
				            </div>

				            <div class="form-group">
					            <label for="password">Password</label>
					            <input type="password" name="password" class="form-control" placeholder="Password" required>
				            </div>
				             <div class="form-group">
                    			<button type="submit" class="btn btn-block btn-primary" name="login">Login</button>
                			</div>
						</form>
            		</div>
            	</div>
            </div>
        </form>
    </div>
</div>

