<?php 

$host = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

$conn = mysqli_connect($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Gagal membuat koneksi!: " . $conn->connect_error);
}
?>