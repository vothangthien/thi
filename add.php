<?php
include __DIR__ . './models/ConnectSql.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql_insert = "INSERT INTO teacher (name, email, password, phone, address, type) 
    VALUES
     ('". $_POST['username']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['phone']."', '".$_POST['address']."', '".$_POST['type']."')";
    if (mysqli_query($conn, $sql_insert)) {
        echo "Thông tin giáo viên đã được thêm thành công.";
        header("Location: http://localhost/thi/Home.php");
    } else {
        echo "Lỗi khi thêm thông tin giáo viên: " . mysqli_error($conn);
    }
}
?>