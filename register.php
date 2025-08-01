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
  <h1 class='text-center m-4 mb-5'>Create new account!</h1>

  <form action="index.php" method="POST" style="max-width: 500px; margin: auto;" enctype="multipart/form-data">

    <div class="username d-flex flex-column mb-3">
      <label for="username">Enter your Username</label>
      <input type="text" name="username" id="username" class="form-control" placeholder="Ex. Ahmed">
    </div>

    <div class="email d-flex flex-column mb-3">
      <label for="email">Enter your Email</label>
      <input type="email" id="email" name="email" class="form-control
      <?php
      if (isset($_SESSION['email_validation_error'])) {
        echo "border border-danger";
      }
      ?>" placeholder="Ex. ahmed@gmail.com">
      <?php
      if (isset($_SESSION['email_validation_error'])) {
        echo "<span class='text-danger'>" . $_SESSION['email_validation_error'] . "</span>";
        session_unset();
      }
      ?>
    </div>

    <div class="password d-flex flex-column mb-3">
      <label for="password">Enter your password</label>
      <input type="password" id="password" name="password" class="form-control <?php
      if (isset($_SESSION['password_validation_error'])) {
        echo "border border-danger";
      }
      ?>" placeholder="Ex. Ahmed123&">
      <?php
      if (isset($_SESSION['password_validation_error'])) {
        echo "<span class='text-danger'>" . $_SESSION['password_validation_error'] . "</span>";
        session_unset();
      }
      ?>
    </div>

    <div class="phone d-flex flex-column mb-3">
      <label for="phone">Enter your phone number</label>
      <input type="phone" id="phone" name="phone" class="form-control " placeholder="+20">
    </div>

    <div class="photo d-flex flex-column mb-3">
      <label for="photo">Enter your address</label>
      <input type="file" name="photo" id="photo" class="form-control " accept="image/*">
    </div>

    <div class="address d-flex flex-column mb-3">
      <label for="address">Enter your address</label>
      <input type="text" name="address" id="address" class="form-control " placeholder="Ex. new damietta">
    </div>

    <?php
    if (isset($_SESSION['duplicated_data'])) {
      echo "<span class='text-danger'>" . $_SESSION['duplicated_data'] . "</span>";
      session_unset();
    } else if (isset($_SESSION['data-notset'])) {
      echo "<span class='text-danger'>" . $_SESSION['data-notset'] . "</span>";
    }
    ?>

    <div class="d-flex justify-content-between mb-3">
      <input type="submit" value="Submit" name="register" class="btn btn-primary">
      <a href="login.php" style="text-decoration: none;" class="text-secondary-emphasis">already have an account?</a>
    </div>

  </form>

</body>

</html>