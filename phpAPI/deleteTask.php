<?php
  include_once 'config.php';

  $conn = mysqli_connect(DB_HOST, USERNAME, PASSWORD, DB_NAME);

  $tasks = json_decode(file_get_contents('php://input'), true);

  // Compruebo que se ha enviado el id de la tarea
  if (!isset($tasks['id'])) {
    echo json_encode(['error' => 'No se ha enviado el id de la tarea']);
    exit;
  }

  $id = $tasks['id'];

  // Preparo la query
  $query = $conn->prepare('DELETE FROM tasks WHERE id = ?');
  $query->bind_param('i', $id);

  // Ejecuto la query
  if ($query->execute()) {
    // Éxito
    echo json_encode(['success' => true, 'message' => 'Task deleted']);
  } else {
    // Error
    echo json_encode(['error' => 'Error deleting task']);
  }

  // Cierro la conexión
  $query->close();
  mysqli_close($conn);
?>


