<?php

  include_once 'config.php';

  $conn = mysqli_connect(DB_HOST, USERNAME, PASSWORD, DB_NAME);

  if (!$conn) {
    echo json_encode(['error' => 'Error al conectar a la base de tasks']);
    exit;
  }

  //Reading
  $query = 'SELECT * FROM tasks';
  $result = mysqli_query($conn, $query);

  $tasks = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $tasks[] = $row;
  }

  echo json_encode($tasks);

  mysqli_free_result($result); // Libera la memoria asociada al resultado
  mysqli_close($conn);
?>
