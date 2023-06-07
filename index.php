<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo isset($title) ? $title : "Trang chủ"; ?></title>
</head>
<body>

<?php
 $page=isset($_GET['page']) ? $_GET['page'] :"Trang chủ";
     switch($page){
          default:
          include __DIR__ . './thi/Home.php';
          break;
     }

?>
     
</body>
</html>