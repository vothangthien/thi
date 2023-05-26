<?php
include __DIR__ . './models/ConnectSql.php';

$teacher_id = $_GET['id'];
$sql_teacher = "SELECT * FROM teacher WHERE id = $teacher_id";
$result_teacher = mysqli_query($conn, $sql_teacher);
$row_teacher = mysqli_fetch_assoc($result_teacher);

echo $row_teacher['name'];

?>

<input type="text" name="id" value="<?php echo $row_teacher['name']; ?>">
