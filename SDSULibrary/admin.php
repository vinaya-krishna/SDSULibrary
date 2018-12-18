<?php
    require('config/config.php');
	  require('config/db.php');
    session_start();

    if (!isset($_SESSION['admin'])) {
      header("Location: login_admin.php");
      exit;
    }

    // $res = mysqli_query($conn, "SELECT * FROM student WHERE redid=" . $_SESSION['user']);
    // $userData = mysqli_fetch_assoc($res);

    // // var_dump($userData);

    // $_SESSION['name'] = $userData['first_name'];


    //create query
    $query = 'SELECT * FROM bookInventory';
    //get results
    $result = mysqli_query($conn, $query);
    //fetch data from result of query
    $inventory = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free the results
    mysqli_free_result($result);
    //close connection
    mysqli_close($conn);
 ?>

<?php include('inc/header.php'); ?>
<?php include('inc/navbar_admin.php'); ?>
<div class="container mt-5">
  <h1>Inventory</h1>
  <a class="btn btn-link" href="addBook.php">Add Book</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Cover</th>
        <th scope="col">Information</th>
        <th scope="col">In Stock</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <?php foreach($inventory as $stock) : ?>
    <tbody>
      <tr>
        <td><?php echo '<img width="30" src="bookCovers/'.$stock['coverImage'].'"'?></td>
        <td><?php echo $stock['bookTitle']?>
            <br>ISBN #: <?php echo $stock['ISBN']?></td>
        <td><?php echo $stock['availability']?></td>
        <td><a class="btn btn-secondary" href="editInfo.php?ISBN=<?php
            echo $stock['ISBN']; ?>">Edit</a>
        </div></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
    
