<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=juz_amma', 'root', '');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $stmt = $dbh->prepare("SELECT * FROM admin WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();

            if (password_verify($password, $user['password'])) {

                $_SESSION['user_id'] = $user['id'];
                header("Location: ../admin_update.php");
            } else {
                echo "Password salah";
            }
        } else {
            echo "Username tidak ditemukan";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
