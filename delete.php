<?php
include __DIR__ . './models/ConnectSql.php';

// Check if the ID parameter is provided
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Delete the account from the database
    $sql_delete = "DELETE FROM teacher WHERE id = '$id'";
    $result_delete = mysqli_query($conn, $sql_delete);

    if ($result_delete) {
        // Account successfully deleted
        echo "Account deleted successfully";
    } else {
        // Failed to delete the account
        echo "Failed to delete the account";
    }
} else {
    // ID parameter is missing
    echo "ID parameter is missing";
}
?>
