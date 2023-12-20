<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password
    
    // Simpan data pengguna ke database (anda harus menggantinya sesuai dengan kebutuhan)
    // Contoh sederhana menggunakan PDO
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=juz_amma', 'root', '');
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Cek apakah username sudah digunakan
        $stmt = $dbh->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            echo "Username sudah digunakan, silakan pilih yang lain.";
        } else {
            // Insert data pengguna baru
            $stmt = $dbh->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            header("Location: ../login.php");
            // echo "Registrasi berhasil. Silakan <a href='login.php'>Login</a>.";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
