<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOME</title>
</head>
<body>
    <!-- tìm kiếm -->
<form action="" method="GET">
    <label>Search</label>
    <input type="search" id="search-teacher" class="search-teach" name="search-teacher">
    <input type="submit" value="Search">
</form>
<!--  sử lý tìm kiếm và xấp sếp -->
<form action="" method="GET">
    <input type="hidden" name="sort" value="<?= isset($_GET['sort']) && $_GET['sort'] === 'asc' ? 'desc' : 'asc'; ?>">
    <input type="submit" name="sort-asc" value="&#x25BC">
    <input type="submit" name="sort-desc" value="&#x25B2">
    <?php
        $search = isset($_GET['search-teacher']) ? $_GET['search-teacher'] : '';
        $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
        $sql_teacher = "SELECT * FROM teacher WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
        if ($sort === 'asc') {
            $sql_teacher .= " ORDER BY name ASC";
        } elseif ($sort === 'desc') {
            $sql_teacher .= " ORDER BY name DESC";
        }
    ?>
</form>
<!-- add account -->
<form action="./add.php" method="POST">
    <input type="text" name="username">
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="tel" name="phone">
    <input type="text" name="address">
    <select name="type">
    <option value="teacher">teacher</option>
        <option value="Administration">Administration</option>
        <option value="student">student</option>
    </select>
    <button type="submit">ADD</button>
</form>

<button onclick="exitPage()">Exit</button>

<!-- hiển thị thông tin -->
<?php
include __DIR__ . '/models/ConnectSql.php';

$result_teacher = mysqli_query($conn, $sql_teacher);

if (mysqli_num_rows($result_teacher) > 0) {
    echo '<table class="teacher-table">';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Email</th>';
    echo '<th>View</th>';
    echo '<th>EDIT</th>';
    echo '<th>Delete</th>';
    echo '</tr>';
    while ($row_teacher = mysqli_fetch_assoc($result_teacher)) {
        echo '<tr>';
        echo '<td class="font-teacher">' . $row_teacher['id'] . '</td>';
        echo '<td class="font-teacher">' . $row_teacher['name'] . '</td>';
        echo '<td class="font-teacher">' . $row_teacher['email'] . '</td>';
        echo '<td><a href="http://localhost/thi/view.php?id=' . $row_teacher['id'] . '">View</a></td>';
        echo '<td><a href="http://localhost/thi/Edit.php?id=' . $row_teacher['id'] . '">EDIT</a></td>';
        echo '<td><a href="http://localhost/thi/delete.php?id=' . $row_teacher['id'] . '" onclick="return confirm(\'Bạn có muốn xóa người dùng này không?\')">DELETE</a></td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'Không tìm thấy thông tin.';
}
?>

<style>
    .teacher-table {
        width: 100%;
        border-collapse: collapse;
    }

    .teacher-table th,
    .teacher-table td {
        padding: 10px;
        border: 1px solid black;
    }

    .teacher-table th {
        background-color: #f2f2f2;
    }

    .teacher-table td a {
        text-decoration: none;
    }
</style>
<!--Chức năng tìm kiếm  -->
<script>
    function search() {
        var input = document.getElementById('search-teacher').value.toLowerCase();
        var rows = document.getElementsByClassName('teacher-table')[0].getElementsByTagName('tr');
        for (var i = 1; i < rows.length; i++) {
            var name = rows[i].getElementsByTagName('td')[1].textContent.toLowerCase();
            var email = rows[i].getElementsByTagName('td')[2].textContent.toLowerCase();
            if (name.indexOf(input) > -1 || email.indexOf(input) > -1) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }

    document.getElementById('search-teacher').addEventListener('keyup', search);
</script>


<!-- Nút Thoát -->
<script>
    function exitPage() {
        window.location.href = "http://localhost/thi/Account/SigNin.php";
    }
</script>

</body>
</html>
