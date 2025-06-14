<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Data formulir
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));
    
    // Periksa apakah semua data terisi
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Konfigurasi email
        $to = "fnzzalfarezqi@gmail.com"; // Ganti dengan email Anda
        $subject = "New message from $name";
        $body = "Nama: $name\nEmail: $email\n\nPesan:\n$message";
        $headers = "From: $email";
        
        // Kirim email
        if (mail($to, $subject, $body, $headers)) {
            echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
        } else {
            echo "<script>alert('Failed to send message. Try again.'); window.location.href='index.html';</script>";
        }
    } else {
        echo "<script>alert('Fill in all data.'); window.location.href='index.html';</script>";
    }
} else {
    // Jika ada akses langsung tanpa formulir
    header("Location: index.html");
    exit();
}
?>
