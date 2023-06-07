<?php
include __DIR__ . './models/ConnectSql.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql_update = "UPDATE teacher SET name='" . $_POST['username'] . "', email='" . $_POST['email'] . "', password='" . $_POST['password'] . "', phone='" . $_POST['phone'] . "', address='" . $_POST['address'] . "' WHERE id = '".$_GET['id']."'";
    if (mysqli_query($conn, $sql_update)) {
        header("Location: http://localhost/thi/Home.php");
        exit();
    }
    echo "Lỗi khi cập nhật thông tin giáo viên: " . mysqli_error($conn);
}
$row_teacher = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM teacher WHERE id = '".$_GET['id']."'"));
?>
<form action="" method="POST">
    <input type="text" name="username" value="<?php echo $row_teacher['name']?>">
    <input type="email" name="email" value="<?php echo $row_teacher['email']?>">
    <input type="password" name="password" value="<?php echo $row_teacher['password'] ?>">
    <input type="tel" name="phone" value="<?php echo $row_teacher['phone']?>">
    <input type="text" name="address" value="<?php echo $row_teacher['address']?>">
    <button type="submit" onclick="return confirm('Are you sure you want to update?')">EDIT</button>
</form>
