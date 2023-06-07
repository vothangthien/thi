<?php
include __DIR__ . './models/ConnectSql.php';

$teacher_id = $_GET['id'];
$sql_teacher = "SELECT * FROM teacher WHERE id = $teacher_id";
$result_teacher = mysqli_query($conn, $sql_teacher);
$row_teacher = mysqli_fetch_assoc($result_teacher);

echo $row_teacher['name'];
echo $row_teacher['email'];
echo $row_teacher['phone'];
echo $row_teacher['address'];

echo md5($row_teacher['password']);


?>

<input type="text" name="id" value="<?php echo $row_teacher['name']; ?>">
