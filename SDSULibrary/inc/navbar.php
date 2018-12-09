
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">SDSU Library</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="profile.php">
            Welcome <?php echo $_SESSION['name']; ?>
          </a>
        </li>

        <?php if (isset($_SESSION['admin']) == False) : ?>
          <li class="nav-item active">
          <a class="nav-link" href="index.php">
            Home
          </a>
        </li>
        <?php endif; ?>
        
        <li class="nav-item active">
          <a class="nav-link" href="login.php">
           LogOut
          </a>
        </li>

    </div>
  </div>
</nav>
