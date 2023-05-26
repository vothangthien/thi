<?php
include __DIR__ . './models/ConnectSql.php';
$teacher_id = $_GET['id'];
$sql_teacher = "SELECT * FROM teacher WHERE id = $teacher_id";
$result_teacher = mysqli_query($conn, $sql_teacher);
$row_teacher = mysqli_fetch_assoc($result_teacher);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql_update = "UPDATE teacher SET name='$username', email='$email', password='$password', phone='$phone', address='$address' WHERE id=$teacher_id";
    if (mysqli_query($conn, $sql_update)) {
        echo "Thông tin giáo viên đã được cập nhật thành công.";
    } else {
        echo "Lỗi khi cập nhật thông tin giáo viên: " . mysqli_error($conn);
    }
}
?>

<form action="" method="POST">
    <input type="text" name="username" value="<?php echo $row_teacher['name']?>">
    <input type="email" name="email" value="<?php echo $row_teacher['email']?>">
    <input type="password" name="password" value="<?php echo $row_teacher['password'] ?>">
    <input type="tel" name="phone" value="<?php echo $row_teacher['phone']?>">
    <input type="text" name="address" value="<?php echo $row_teacher['address']?>">
    <button type="submit">EDIT</button>
</form>
