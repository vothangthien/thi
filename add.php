<?php
include __DIR__ . './models/ConnectSql.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $type = $_POST['type'];

    $sql_insert = "INSERT INTO teacher (name, email, password, phone, address, type) VALUES ('$username', '$email', '$password', '$phone', '$address', '$type')";
    if (mysqli_query($conn, $sql_insert)) {
        echo "Thông tin giáo viên đã được thêm thành công.";
header("localhost:http://localhost/thi/Home.php");
    } else {
        echo "Lỗi khi thêm thông tin giáo viên: " . mysqli_error($conn);
    }
}
?>