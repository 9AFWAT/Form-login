<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Log in</title>
</head>

<body class="mt-5">
  <h1 class='text-center m-4 mb-5 pt-5'>Login!</h1>

  <form action="index.php" method="POST" style="max-width: 500px; margin: auto;">

    <div class="email d-flex flex-column mb-3">
      <label for="email">Enter your Email</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="Ex. ahmed@gmail.com">
      <!-- <span class="text-danger">please enter email correctly</span> -->
    </div>

    <div class="password d-flex flex-column mb-3">
      <label for="password">Enter your password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Ex. Ahmed123&">
    </div>

    <?php 
      if (isset($_SESSION["datanotset"])) {
        echo "<span class='text-danger'>" . $_SESSION["datanotset"] . "</span>";
        session_unset();
      }
    ?>

    <div class="d-flex justify-content-between">
      <input type="submit" value="Submit" name="login" class="btn btn-primary">
      <a href="register.php" style="text-decoration: none;" class="text-secondary-emphasis">Create new Account?</a>
    </div>

  </form>

</body>

</html>