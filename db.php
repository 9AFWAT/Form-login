<?php
  class db {
    public $conn;

    public function __construct()
    {
      $this->conn = new mysqli("localhost", "root", "", "test");
      if ($this->conn->connect_error) {
        die("Connection failed! " . $this->conn->connect_error);
      }
    }
  }