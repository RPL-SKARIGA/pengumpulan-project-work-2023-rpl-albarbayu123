<?php
session_start();

if (isset($_SESSION['user_id'])):
  $user = $_SESSION['user_id'];
else:
  $user = -1;
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="icon" href="img/juzamma.png">
  <link rel="stylesheet" type="text/css" href="rizz.css">
  <title>Juz 30</title>
  <style>
    .card-link {
      text-decoration: none;
      color: black;
    }
  </style>
  
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-warning">
    <div class="container">
      <a class="navbar-brand" href="index.php" style="display: flex; flex-direction: row; align-items: center">
        <img class="logo" src="img/juzamma.png" width="80px" height="80px" alt="logo">
        <p style="font-size: 20px">​🇯​​🇺​​🇿​ ​🇦​​🇲​​🇲​​🇦</p>
      </a>

      <div style="display: flex; align-items: center; justify-content: space-between; gap: 30px;">
        <div>
          <?php if (isset($_COOKIE["terakhir_baca$user"])): ?>
            <a class='btn btn-dark' href='<?php echo $_COOKIE["url_terakhir_baca$user"] ?>'>terakhir baca
              <?php echo $_COOKIE["nama_terakhir_baca$user"] ?>
            </a>
          <?php endif ?>
        </div>

        <div style="display: flex; flex-direction: column; align-items: center">
          <a class="card-link" href="<?php
          if (isset($_SESSION["user_id"])) {
            echo "logout.php";
          } else {
            echo "login.php";
          }
          ?>">
            <svg class="text-end" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
              class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
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
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>