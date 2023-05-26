<form action="" method="GET">
     <label>Search</label>
     <input type="search" id="search-teacher" class="search-teach" name="search-teacher">
     <input type="submit" value="Search">
</form>
<?php
  include __DIR__ . './models/ConnectSql.php';
  
  // Retrieve the search query from the GET parameters
  $search = isset($_GET['search-teacher']) ? $_GET['search-teacher'] : '';

  // Construct the SQL query with search conditions
  $sql_teacher = "SELECT * FROM teacher WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
  $result_teacher = mysqli_query($conn, $sql_teacher);

  if (mysqli_num_rows($result_teacher) > 0) {
      echo '<table class="teacher-table">';
      echo '<tr>';
      echo '<th>ID</th>';
      echo '<th>Name</th>';
      echo '<th>Email</th>';
      echo '<th>View</th>';
      echo '</tr>';
      while ($row_teacher = mysqli_fetch_assoc($result_teacher)) {
          echo '<tr>';
          echo '<td class="font-teacher">' . $row_teacher['id'] . '</td>';
          echo '<td class="font-teacher">' . $row_teacher['name'] . '</td>';
          echo '<td class="font-teacher">' . $row_teacher['email'] . '</td>';
          echo '<td><a href="http://localhost/thi/view.php?id=' . $row_teacher['id'] . '">View</a></td>';
          echo '</tr>';
      }
      echo '</table>';
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
</script>
