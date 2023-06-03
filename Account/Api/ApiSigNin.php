<?php
$conn = mysqli_connect("localhost", "root", "", "sqlphp");
if (!$conn) {
    die("Error connecting to the database: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = md5($_POST['password']);

$query = "SELECT * FROM teacher WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $query);

if ($result) {
    // Kiểm tra xem có người dùng khớp với thông tin đăng nhập hay không
    if (mysqli_num_rows($result) == 1) {
        // Người dùng đã đăng nhập thành công
        // Tiếp tục xử lý hoặc chuyển hướng đến trang chính
        header("Location: http://localhost/thi/Home.php");
        exit; // Thêm câu lệnh exit để ngăn mã tiếp tục thực thi sau khi chuyển hướng
    } else {
        // Thông báo lỗi đăng nhập
        echo "Invalid email or password";
    }
} else {
    // Xử lý lỗi truy vấn
    echo "Error: " . mysqli_error($conn);
}

?>
