<?php
session_start();

if (isset($_SESSION['user_id'])):
  $user = $_SESSION['user_id'];
else:
  $user = -1;
endif;
?>
<nav class="navbar bg-body-primary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
    <img class="logo" src="../img/juzamma.png" width="70px" height="70px" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">JUZ 30</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="surat.php">Surat-Surat</a>
          </li>
        </ul
      </div>
    </div>
    <hr>
    <div style="display: flex; flex-direction: column; align-items: center">
          <a class="card-link" href="<?php
          if (isset($_SESSION["user_id"])) {
            echo "logout.php";
          } else {
            echo "login.php";
          }
          ?>">
            <svg class="text-end" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
              class="bi bi-box-arrow-in-right" style="color: black;" viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
              <path fill-rule="evenodd"
                d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
              <p style="font-size: 15px">
                <?php
                if (isset($_SESSION["user_id"])) {
                  echo "Logout";
                } else {
                  echo "Login";
                }
                ?>
              </p>
            </svg>
            </a>
            </div>
  </div>
</nav>