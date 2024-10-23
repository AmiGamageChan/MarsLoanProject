<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand text-dark" href="index.php">
      <img src="Resources/icon.jpg" alt="" height="35" class="me-2">Dashboard
    </a>

     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active d-none d-lg-block text-nowrap" aria-current="page" href="adminDashboard.php">|</a>
        </li>

        <li class="nav-item ms-1">
          <button class="btn btn-danger col-auto text-nowrap w-100 mt-1" onclick="adminSignOut();">Sign Out</button>
        </li>
      </ul>
    </div>
  </div>
</nav>