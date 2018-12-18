<?php
	require('config/config.php');
	require('config/db.php');
    session_start();
    mysqli_close($conn);
?>



<?php include('inc/header.php'); ?>
<?php include('inc/navbar.php'); ?>
<div class="container mt-5">
    <h1>Thanks, Book returned successfully</h1>
    <a href="http://localhost:8080/SDSULibrary/" class="btn btn-primary">Home</a>
</div>

<?php include('inc/footer.php'); ?>
