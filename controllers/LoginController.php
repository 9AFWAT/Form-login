<?php
  class LoginController {
    private $db;
    private $data;
    public function __construct($db, $data) {
      $this->db = $db;
      $this->data = $data;
    }

    public function checkUser() {
      $email = $this->data['email'];
      $password = $this->data['password'];

      // check if data exists
      $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ? AND password = ?");
      $stmt->bind_param("ss", $email, $password);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        header('location: dashboard.php');
        $row = $result->fetch_assoc();
        setcookie('userId', $row['id']);
      } else {
        session_start();
        $_SESSION['datanotset'] = "This Email and Password is not Existed!";
        header("location: login.php");
        exit();
      }
    }
  }