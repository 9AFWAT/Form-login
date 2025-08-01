<!DOCTYPE html>
<?php
  if(!isset($_COOKIE['userId'])) {
    header('location: register.php');
  }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Dashboard</title>
</head>

<body>
  <nav class="bg-success text-white d-flex justify-content-between align-items-center py-2" style="padding-inline: 80px;">
    <div class="heading">
      <h1>Dashboard</h1>
    </div>
    <div class="logout me-5 bg-success-bg-subtle px-4 py-2 rounded" style="background-color: #37cf89">
      <a href="logout.php" class="text-white" style="text-decoration: none;">Logout</a>
    </div>
  </nav>

    <div class="dashboard pt-4 px-2">
      <h2>welcome to Dashboard</h2>
    </div>

    <?php
      include_once './db.php';
      $db = new db();
      $id = $_COOKIE['userId'];
      $stmt = $db->conn->prepare("SELECT * FROM users WHERE id = ?");
      $stmt->bind_param("s", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();
    ?>
    <div style="width: 800px; margin: auto; display: flex;">
        <div>
          <img src="<?php echo $row['file_path'];
        ?>" alt="" style="width" />
        </div>
        <div style="flex: 1;">
          <h3>Welcome <?php echo $row['username'] ?></h3>
          <h3>Email: <?php echo $row['email'] ?></h3>
          <h3>password: <?php echo $row['password'] ?></h3>
          <h3>phone number: <?php echo $row['phone'] ?></h3>
          <h3>address: <?php echo $row['address'] ?></h3>
        </div>
    </div>

</body>

</html>