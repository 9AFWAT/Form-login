<?php
include_once __DIR__ . "/../db.php";

class RegisterController
{
  private $db;
  private $data;
  public function __construct($db, $data)
  {
    $this->db = $db;
    $this->data = $data;
  }

  public function registerUser()
  {
    $username = $this->data['username'];
    $email = $this->data['email'];
    $password = $this->data['password'];
    $phone = $this->data['phone'];
    $photo = $this->data['profile_pic'];
    $address = $this->data['address'];


    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      session_start();
      $_SESSION['email_validation_error'] = 'Please Enter email correctly';
      header("location: register.php");
      exit();
    }

    // Password validation
    if (strlen($password) < 8) {
      session_start();
      $_SESSION['password_validation_error'] = 'password is too short';
      header("location: register.php");
      exit();
    }

    // check if all data has been entered
    if (($username && $email && $password && $phone && $address) == '' ) {
      session_start();
      $_SESSION['data-notset'] = 'Please fill in all forms';
      header("location: register.php");
      exit();
    }

    // grab the data from the database
    $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ? OR password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();

    // Check if there is same email or password in database
    if ($stmt->num_rows > 0) {
      session_start();
      $_SESSION['duplicated_data'] = 'Your Email or password are already in use please try another';
      header("location: register.php");
      exit();
    }

    // handle photo
    $tmp_path = $photo['tmp_name'];
    $photo_name = $photo['name'];
    $extensionByName = pathinfo($photo_name, PATHINFO_EXTENSION);
    $new_name = $username . $extensionByName;
    $uploadFiledir = '../assets/';
    $new_file_path= './assets/' . $new_name;
    if (move_uploaded_file($tmp_path, $new_file_path)) {
      echo 'success';
    }

    $stmt = $this->db->prepare("INSERT INTO users (id, username, email,password,phone,file_path, address) VALUES (UUID(), ?, ? ,? ,? , ? ,?)");

    $stmt->bind_param('ssssss',  $username, $email, $password, $phone, $new_file_path , $address);
    if ($stmt->execute()) {
      echo "تم تسجيل المستخدم بنجاح!";
    } else {
      echo "خطأ أثناء التسجيل: " . $stmt->error;
    }
    $stmt->close();
  }

  public function saveUser() {
    $stmt = $this->db->prepare("SELECT id FROM users where email = ? and password = ?");
    $stmt->bind_param("ss", $this->data['email'], $this->data['password']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      setcookie('userId', $row['id']);
      header("location: dashboard.php");
  }
}
}