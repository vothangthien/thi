<?php
$conn = mysqli_connect("localhost", "root", "", "sqlphp");
if (!$conn) {
    die("Error connecting to the database: " . mysqli_connect_error());
}if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $type = $_POST['type'];

    // Check if the email already exists in the database
    $sql_check = "SELECT * FROM teacher WHERE email = '$email'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Email already exists
        echo "Email đã tồn tại. Vui lòng sử dụng email khác.";
    } else {
        // Email is unique, proceed with registration
        $sql_insert = "INSERT INTO teacher (name, email, password, phone, address, type) VALUES ('$username', '$email', '$password', '$phone', '$address', '$type')";
        if (mysqli_query($conn, $sql_insert)) {
            // Registration successful
            echo "Đăng ký thành công!";
            header("Location: http://localhost/thi/Home.php");            // Redirect to the desired page
            exit();
        } else {
            // Registration failed
            echo "Đăng ký không thành công. Vui lòng thử lại sau.";
        }
    }
}
  
?>
