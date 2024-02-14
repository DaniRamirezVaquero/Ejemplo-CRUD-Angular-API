<?php
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
  header('Access-Control-Allow-Headers: Content-Type, Authorization');
  header('Content-Type: application/json');

  define('DB_HOST', 'db');
  define('USERNAME', 'root');
  define('PASSWORD', 'rootpassword');
  define('DB_NAME', 'todoList');
