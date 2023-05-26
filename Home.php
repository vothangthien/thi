<form action="" method="GET">
     <label>Search</label>
     <input type="search" id="search-teacher" class="search-teach" name="search-teacher">
     <input type="submit" value="Search">
     <input type="hidden" name="sort" value="<?php echo isset($_GET['sort']) && $_GET['sort'] === 'asc' ? 'desc' : 'asc'; ?>">
     <input type="submit" name="sort-asc" value="&#x25BC">
     <input type="submit" name="sort-desc" value="&#x25B2">
</form>



<form action="./add.php" method="POST">
    <input type="text" name="username" >
    <input type="email" name="email" >
    <input type="password" name="password">
    <input type="tel" name="phone">
    <input type="text" name="address" >
    <select type="type" name="type">
        <option value="Administration" name="Administration">Administration</option>
        <option value="student" name="student">student</option>
        <option value="teacher"name="teacher">teacher</option>

    </select>
    <button type="submit">ADD</button>
</form>



<?php
  include __DIR__ . './models/ConnectSql.php';
  
  // Retrieve the search query from the GET parameters
  $search = isset($_GET['search-teacher']) ? $_GET['search-teacher'] : '';

  // Retrieve the sort order from the GET parameters
  $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

  // Construct the SQL query with search and sort conditions
  $sql_teacher = "SELECT * FROM teacher WHERE name LIKE '%$search%' OR email LIKE '%$search%'";

  // Append the sort order to the SQL query if provided
  if ($sort === 'asc') {
    $sql_teacher .= " ORDER BY name ASC";
  } elseif ($sort === 'desc') {
    $sql_teacher .= " ORDER BY name DESC";
  }

  $result_teacher = mysqli_query($conn, $sql_teacher);

  if (mysqli_num_rows($result_teacher) > 0) {
      echo '<table class="teacher-table">';
      echo '<tr>';
      echo '<th>ID</th>';
      echo '<th>Name</th>';
      echo '<th>Email</th>';
      echo '<th>View</th>';
      echo '<th>Delete</th>';
      echo '</tr>';
      while ($row_teacher = mysqli_fetch_assoc($result_teacher)) {
          echo '<tr>';
          echo '<td class="font-teacher">' . $row_teacher['id'] . '</td>';
          echo '<td class="font-teacher">' . $row_teacher['name'] . '</td>';
          echo '<td class="font-teacher">' . $row_teacher['email'] . '</td>';
          echo '<td><a href="http://localhost/thi/view.php?id=' . $row_teacher['id'] . '">View</a></td>';
          echo '<td><a href="http://localhost/thi/Edit.php?id=' . $row_teacher['id'] . '">EDIT</a></td>';
          echo '<td><button onclick="deleteAccount(' . $row_teacher['id'] . ')">Delete</button></td>';
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
     .teacher-table th, .teacher-table td {
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

<script>
  function search() {
    // Get the input value
    var input = document.getElementById('search-teacher').value.toLowerCase();
    // Get all the rows
    var rows = document.getElementsByClassName('teacher-table')[0].getElementsByTagName('tr');
    // Loop through the rows and hide/show them based on the search result
    for (var i = 1; i < rows.length; i++) {
      var name = rows[i].getElementsByTagName('td')[0].textContent.toLowerCase();
      var email = rows[i].getElementsByTagName('td')[1].textContent.toLowerCase();
      if (name.indexOf(input) > -1 || email.indexOf(input) > -1) {
        rows[i].style.display = '';
      } else {
        rows[i].style.display = 'none';
      }
    }
  }
  // Add event listener to the search input
  document.getElementById('search-teacher').addEventListener('keyup', search);

  function deleteAccount(id) {
    // Confirm the deletion
    var confirmDelete = confirm("Are you sure you want to delete this account?");
    if (confirmDelete) {
      // Send an AJAX request to delete the account
      var xhr = new XMLHttpRequest();
      xhr.open('POST', './delete.php');
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          // Refresh the page to update the account list
          window.location.reload();
        }
      };
      xhr.send('id=' + id);
    }
  }
</script>
