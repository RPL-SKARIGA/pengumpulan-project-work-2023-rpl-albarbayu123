<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=juz_amma', 'root', '');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Ambil data pengguna berdasarkan username
        $stmt = $dbh->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Password benar, set session dan redirect
                $_SESSION['user_id'] = $user['id'];
                header("Location: ../index.php");
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
