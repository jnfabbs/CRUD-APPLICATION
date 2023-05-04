<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Erick Company Clients</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
 <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container my-5">
<h1>Clients List</h1>
<a href="/myshop/create.php" class="btn btn-primary" role="button">New Client</a>
<table class="table">
 <thead>
  <tr>
   <th>ID</th>
   <th>Name</th>
   <th>Email</th>
   <th>Phone</th>
   <th>Address</th>
   <th>Time Created</th>
   <th>Action</th>
  </tr>
 </thead>
 <tbody>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "mycompany";

  //create connection
  $connection = new mysqli($servername, $username, $password, $database);

  //check connection
  if ($connection->connect_error) {
   die("connection failed: " . $connection->connect_error);
   }

   //read all row from database table
   $sql = "SELECT * FROM clients";
   $result = $connection->query($sql);

   if (!$result) {
    die("Invalid query: " . $connection->error);
   }

   //read data from each row
   while($row = $result->fetch_assoc()){
    echo "
    <tr>
   <td>$row[id]</td>
   <td>$row[name]</td>
   <td>$row[email]</td>
   <td>$row[phone]</td>
   <td>$row[address]</td>
   <td>$row[created_at]</td>
   <td>
    <a href='/myshop/edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
    <a href='/myshop/delete.php?id=$row[id]' class='btn btn-danger btn-sm'>Delete</a>
   </td>
  </tr>
    ";
   }
  ?>

  
 </tbody>
</table>
<br>
</div>
 
</body>
</html>