<?php
  include_once "./DB.php";
  include_once "./controllers/RegisterController.php";
  include_once "./controllers/LoginController.php";

  if (isset($_POST["register"])) {
    
    $db = new db();
    $conn = $db->conn;
    
    $data = [
      'username'=> mysqli_real_escape_string($conn,$_POST['username']),
      'email' => mysqli_real_escape_string($conn,$_POST['email']),
      'password' => mysqli_real_escape_string($conn,$_POST['password']),
      'phone' => mysqli_real_escape_string($conn,$_POST['phone']),
      'profile_pic' => $_FILES['photo'],
      'address' => mysqli_real_escape_string($conn,$_POST['address']),
    ];

    $register = new RegisterController($conn, $data);
    $register->registerUser();
    $register->saveUser();
  }

  if (isset($_POST["login"])) {
    $db = new db();
    $conn = $db->conn;

    $data = [
      'email' => $_POST['email'],
      'password' => $_POST['password'],
    ];

    $userCheck = new LoginController($conn, $data);
    $userCheck->checkUser();
  }
