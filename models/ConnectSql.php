
<?php
$conn = mysqli_connect("localhost", "root", "", "sqlphp");
if (!$conn) {
    die("Error connecting to the database: " . mysqli_connect_error());
}
?>
